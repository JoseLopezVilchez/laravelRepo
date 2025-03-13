<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function clic(User $user)
    {
        $user->clics += 1;
        $user->save();

        return response()->json([
            'message' => 'Clic',
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function index()
    {
        $datos['users'] = User::all();
        return view('', $datos); //TODO: insertar nombre de la view
    }

    public function create (Request $request) {
        $data = $request->only('name', 'email', 'pass', 'clics');
        $validator = Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'pass' => ['required', 'string'],
            'clics' => ['required', 'int']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], Response::HTTP_BAD_REQUEST);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pass),
            'clics' => $request->clics
        ]);

        return response()->json([
            'message' => 'Usuario creado, devolviendo copia para que puedas comprobarlo si quieres',
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function reiniciar () {
        $datos['users'] = User::all();
        return view('reiniciar', $datos); //TODO: insertar nombre de la view
    }

    public function clicReset (User $user) {
        $user->clics = 0;
        $user->save();
        $this->reiniciar();
    }
}
