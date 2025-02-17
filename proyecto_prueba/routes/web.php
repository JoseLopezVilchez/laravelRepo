<?php

use App\Http\Controllers\LibrosController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// nota: el comando php artisan route:list permite ver el listado de routes en funcionamiento
// si no saliese una, puedes usar php artisan route:clear para limpiar el cache
// y con php artisan route:cache regeneras las rutas en el cache

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return [
        'ejemplo' => [
            'blah',
            'bleh'
        ]
    ];
});

Route::get('/products/{id}', function ($id) {
    return [
        $id => [
            $id+1,
            $id+100
        ]
    ];
}) -> where('id', '[0-9]+'); //vamos, que permite meter expresiones regulares para asegurarse de que los valores sean de una determinada forma

Route::get('/products/{id}/{pene}', function ($id, $pene) {
    return [
        $id => [
            $id+1,
            $pene+100
        ]
    ];
}) -> where('id', '[0-9]+')->where('pene', '20');

Route::get('/products/ejemplo/{id?}', function ($id = 0) { //con ? haces que sea opcional, y le metes un valor por defecto
    return [
        $id => [
            $id+1,
            $id+100
        ]
    ];
}) -> where('id', '[0-9]+');

Route::prefix('/admin')->group(function () { // grupos de rutas. Puedes meter grupos dentro de grupos
    Route::get('/papa', function () {
        print 'frita';
    });

    Route::get('/chocolate', function () {
        print 'blanco';
    });
});

Route::match(['get', 'post'], '/worble', function () { // puedes acceder a ruta desde distintos metodos
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'GET') {
        print 'blorble';
    } else {
        print 'glorble';
    }    
});

Route::redirect('/mek', '/worble', 301); // lleva de una ruta a otra

Route::view('usuarios', 'welcome'); // ojo, no es igual que redirect, hace que en vez de una vista te muestre otra

Route::view('usuarios', 'welcome', ['name' => 'Alfonso']);

Route::get('papo/{userId}/{userName?}', function ($userId, $userName = '') { //esto es para pasar información a una vista (luego la usas en donde sea que la mandes)
    //return view('welcome', ['userId' => $userId, 'userName' => $userName]); // no tiene por qué coincidir el nombre de uno y otro, pero suele interesar por simplicidad
    $name = $userName;
    return view('welcome', compact('userId', 'name')); //compact hace lo mismo que la linea comentada de arriba. Interesa cuando tienes que mandar muchas cosas.
});

Route::get('saludo', function () {
    print 'hola hola';
})->name('saludo'); // esto le da un nombre a la ruta para usarlo mas adelante. El nombre es independiente de la url. Interesa que el nombre sea distinto a la url, aunque aqui sea igual

Route::get('enlaces', function () { // puedes hacer links a rutas
    print '<a href="./saludo">Ir a saludo</a><br/>';
});

Route::get('enlaces2', function () {
    print '<a href="' . route('saludo') . '">Ir a saludo</a><br/>'; // tambien puedes hacer links asi, siempre y cuando la ruta tenga nombre
});

Route::fallback(function () { // esto maneja lo que sea que no esté definido
    print 'error 404';
});

use App\Http\Controllers\UserController; //Esto es para instanciar controladores
use App\Http\Middleware\CheckAge;

// Route::get('/simple', UserController::class); // Esto seria si fuese un controlador simple de una sola cosa con __invoke
Route::get('/simple/{nombre}', [UserController::class, 'saludo']); //Esto invoca a un metodo de un controlador de un determinado nombre

Route::resource('Libros', LibrosController::class); //para que resource() funcione, requiere que el controller se adecue a un crud de laravel (como lo crea artisan)

Route::get('/mayores', function () {
    return 'Hola, persona mayor de edad';
})->middleware(CheckAge::class); //Esto es para hacer que una ruta pase por un middleware. Acepta múltiples middleware con comas, no necesita corchetes

//Si haces un grupo de rutas, puedes aplicarles a todas los mismos middleware
Route::group(['middleware' => [CheckAge::class]], function () {
    Route::get('/mayores2', function () {
        return 'Hola, persona mayor de edad';
    });
});

//Esto hace exactamente lo mismo
Route::middleware([CheckAge::class])->group(function () {
    Route::get('/mayores3', function () {
        return 'Hola, persona mayor de edad';
    });
});

Route::get('/form', [TestController::class, 'formulario']);
Route::get('/recibeForm', [TestController::class, 'recibeForm']);