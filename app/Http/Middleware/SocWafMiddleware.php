<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SocWafMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // 1. Ekstrak data request untuk diinspeksi
        $payload = [
            'data' => [
                'url' => $request->fullUrl(),
                'referrer' => $request->header('referer', ''),
                'user_agent' => $request->header('user-agent', ''),
            ],
            'ip_address' => $request->ip(),
            'method' => $request->method(),
        ];

        try {
            // 2. Teruskan ke Flask ML Engine (timeout singkat 2 detik agar tidak menghambat)
            $response = Http::timeout(2)->post('http://127.0.0.1:5000/predict', $payload);

            if ($response->successful()) {
                $result = $response->json();

                // 3. Jika terdeteksi sebagai ancaman, blokir dan tampilkan 403 Forbidden
                if (isset($result['status']) && $result['status'] === 'threat') {
                    return response()->view('errors.403', [
                        'message' => 'Aktivitas berbahaya terdeteksi oleh SOC SIAKAD. Akses diblokir.',
                        'incident_type' => $result['category'] ?? 'Security Threat'
                    ], 403);
                }
            }
        } catch (\Exception $e) {
            // Fail-open: jika service ML offline sementara, izinkan request agar SIAKAD tidak down
            Log::warning('SOC ML Service Unreachable: ' . $e->getMessage());
        }

        return $next($request);
    }
}
