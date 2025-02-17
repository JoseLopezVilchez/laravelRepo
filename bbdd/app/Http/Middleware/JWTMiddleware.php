<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            //comprueba tipo de excepcion
            if ($e instanceof Exceptions\InvalidClaimException) {
                return response()->json(['status' => 'Token is invalid'], 401);
            } elseif ($e instanceof Exceptions\TokenExpiredException) {
                return response()->json(['status' => 'El token ha expirado'], 401);
            } else {
                return response()->json(['status' => 'Token not found'], 401);
            }
        }

        return $next($request); //al ser middleware hay que ejecutar esto para permitir que pase la siguiente peticion

    }
}
