<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WafMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // 1. Ambil payload dan metadata request lengkap dari pengunjung
        $payload = [
            'data' => [
                'url' => $request->getRequestUri(),
                'referrer' => $request->headers->get('referer', ''),
                'user_agent' => $request->userAgent() ?? '',
            ],
            'ip_address' => $request->ip(),
            'method' => $request->method(),
        ];

        try {
            // 2. Kirim ke API Flask ML Service
            $response = Http::timeout(3)->post('http://127.0.0.1:5000/predict', $payload);

            if ($response->successful()) {
                $result = $response->json();

                // 3. HANYA JIKA IP SUDAH DIBLOKIR OLEH ADMIN (TERDAFTAR DI BLACKLIST):
                // Tolak akses secara absolut (403 Forbidden).
                if (isset($result['category']) && $result['category'] === 'IP Blacklist') {
                    Log::warning('BLOCKED IP ACCESS REJECTED', [
                        'ip' => $request->ip(),
                        'url' => $request->fullUrl()
                    ]);

                    return response()->view('errors.403', [
                        'message' => 'IP (' . $request->ip() . ') diblokir secara permanen Administrator'
                    ], 403);
                }

                // Catatan: Jika IP belum diblokir oleh admin, serangan tetap tercatat di SOC
                // tetapi request tidak langsung diblokir di level middleware (Mode IDS, bukan IPS).
            }
        } catch (\Exception $e) {
            // Fail open jika ML service offline agar aplikasi SIAKAD tidak lumpuh
            Log::error('WAF SERVICE ERROR', [
                'message' => $e->getMessage()
            ]);

            return $next($request);
        }

        return $next($request);
    }
}
