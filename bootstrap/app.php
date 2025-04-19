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
    ->withMiddleware(function (Middleware $middleware) {
        // Register route middleware using the alias() method
        $middleware->alias([
            'authMiddleware' => \App\Http\Middleware\AuthMiddleware::class, // register your custom middleware
            'is_admin' => \App\Http\Middleware\adminOnlyMiddleware::class, 
            'is_user' => \App\Http\Middleware\userOnlyMiddleware::class, 
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();