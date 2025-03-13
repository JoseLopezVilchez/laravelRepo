<?php

use App\Http\Controllers\EjemploController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

//Nota para mi: HAY QUE AÑADIR ESTE ARCHIVO A bootstrap/app.php O NO FUNCIONA NADA

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (! Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'message' => 'The provided credentials are incorrect.'
        ], 401);
    }

    $user = User::where('email', $request->email)->first();

    $token = $user->createToken('Token for user ' . $user->email)->plainTextToken;

    return response()->json(['token' => $token], 200);
});

Route::prefix('/v1')->middleware(['auth:sanctum'])->group(function () { //si le pongo esta línea en vez de la inferior, requiere pasar por autorización
//Route::prefix('v1')->group(function () {

    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have been successfully logged out.'
        ], 200);
    });

    Route::prefix('/ejemplos')->group(function () {

        Route::get('/', [EjemploController::class, 'index'])->name('ejemplos.index');
        Route::post('/store', [EjemploController::class, 'store'])->name('ejemplos.store');
        Route::get('/{ejemplo}', [EjemploController::class, 'show'])->name('ejemplos.show');
        Route::put('/update/{ejemplo}', [EjemploController::class, 'update'])->name('ejemplos.update');
        Route::delete('/destroy/{ejemplo}', [EjemploController::class, 'destroy'])->name('ejemplos.destroy');

    });

});