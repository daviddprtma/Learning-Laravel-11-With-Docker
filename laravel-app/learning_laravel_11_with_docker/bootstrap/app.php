<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        apiPrefix: 'api/v1/',
        commands: __DIR__ . '/../routes/console.php',
        channels: __DIR__ . '/../routes/channels.php',
        health: '/status',
        then: function () {
            Route::prefix('admin')
                ->name('admin.')
                ->middleware('web')
                ->group(base_path('routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        // $middleware->prepend([
        //     \App\Http\Middleware\TestMiddleware::class,
        // ]);
        // $middleware->appendToGroup('testGroup', [
        //     \App\Http\Middleware\TestMiddleware::class,
        // ]);

        // $middleware->web(append: [
        //     \App\Http\Middleware\TestMiddleware::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
