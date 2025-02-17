<?php

use App\Http\Middleware\CheckAge;
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
        //$middleware->append(CheckAge::class); //Esto hace que TODAS las peticiones pasen por el middleware 'CheckAge', definido en otro archivo. Puedes añadir multiples middleware
        /*$middleware->use([ //Con esto puedes meter múltiples middleware de golpe
            CheckAge::class
        ]);*/
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
