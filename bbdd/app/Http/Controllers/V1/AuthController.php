<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    //registro de usuario
    public function register (Request $request) {

        //filtramos los campos que necesitamos de la petición
        $data = $request->only('name', 'email', 'password');

        //realizamos validaciones
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages(), 400]);
        }

        $user = User::create($data);

        //guardo email y contraseña para realizar peticion de token a jwtauth
        $credentials = $request->only('email', 'password');

        //devuelve la respuesta con token de usuario
        return response()->json([
            'message' => 'User created',
            'token' => JWTAuth::attempt($credentials),
            'user' => $user,
        ], Response::HTTP_OK);
    }

    //para iniciar sesion a traves de la api
    public function login (Request $request) {

        //tomamos de la peticion el email y contrasenya
        $credentials = $request->only('email', 'password');

        //validacion
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        //intentamos hacer login
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                //credenciales incorrectas
                return response()->json(['message' => 'Error en las credenciales'], 401);
            }
        } catch (JWTException $e) {
            //error grave
            return response()->json(['message' => 'Error inesperado'], 500);
        }

        //si todo ha ido bien, se ha podido identificar al usuario, y le devolvemos el token
        return response()->json([
            'token' => $token,
            'user' => Auth::user()
        ]);

    }

    public function logout () {
        //verificamos que se ha recibido token (que se ha hecho login antes, vamos)
        /*$validator = Validator::make($request->only('token'), ['token' => 'required']);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }*/

        //si pasa satisfactoriamente la validación, anulamos el token desconectando al usuario
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'message' => 'Usuario desconectado',
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => "Error",
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    public function getUser (Request $request) {
        //validamos que la request tenga el token
        /*$this->validate($request, [
            'token' => 'required',
        ]);*/

        $token = JWTAuth::getToken();

        //realizamos la autenticacion
        try {
            $user = JWTAuth::authenticate($token);
            return response()->json(['user' => $user]);
        } catch (JWTException $e) {
            return response()->json([
                'message' => 'Token no válido, o expirado',

            ], 401);
        }
    }
}
