<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'superadmin.auth'  => \App\Http\Middleware\SuperadminAuthenticated::class,
            'superadmin.guest' => \App\Http\Middleware\SuperadminGuest::class,
            'admin.auth'       => \App\Http\Middleware\AdminAuthenticated::class,
            'admin.guest'      => \App\Http\Middleware\AdminGuest::class,
            'member.auth'      => \App\Http\Middleware\MemberAuthenticated::class,
            'member.guest'     => \App\Http\Middleware\MemberGuest::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
