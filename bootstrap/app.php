<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // 🔥 Alias middleware
        $middleware->alias([
            'waf' => \App\Http\Middleware\WafMiddleware::class,
        ]);

        // 🔥 Aktifkan WAF ke semua web request
        $middleware->web(append: [
            \App\Http\Middleware\WafMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        // 🔥 HANDLE ERROR 403 (INI KUNCI)
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\HttpException $e, $request) {

            if ($e->getStatusCode() === 403) {
                return response()->view('errors.403', [], 403);
            }

            return null;
        });
    })->create();
