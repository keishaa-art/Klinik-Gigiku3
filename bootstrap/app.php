<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DokterMiddleware;
use App\Http\Middleware\EnsureOtpVerified;
use App\Http\Middleware\PasienMiddleware;
use App\Http\Middleware\FarmasiMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'AdminMiddleware' => AdminMiddleware::class,
            'FarmasiMiddleware' => FarmasiMiddleware::class,
            'DokterMiddleware' => DokterMiddleware::class,
            'PasienMiddleware' => PasienMiddleware::class,
            'ensure.otp.verified' => EnsureOtpVerified::class,
            'auth' => Authenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
