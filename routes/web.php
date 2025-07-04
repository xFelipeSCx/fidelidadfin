<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MarcasDescuentoController;
use App\Http\Controllers\DescuentoController;



Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/tienda', [ProductoController::class, 'tienda'])->name('tienda');




Auth::routes();




Route::middleware('auth')->group(function () {
    Route::resource('productos', ProductoController::class);
    Route::resource('carritos', CarritoController::class);
    Route::resource('users', UserController::class);
    Route::resource('marcas-descuentos', MarcasDescuentoController::class);
    Route::resource('descuentos', DescuentoController::class);
    

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/carrito/usuario', [App\Http\Controllers\CarritoController::class, 'carrito'])->name('carrito');

    Route::post('/carrito/añadir', [CarritoController::class, 'añadirCarrito'])->name('añadir.carrito');

    Route::put('/carrito/{carrito}/guardar', [CarritoController::class, 'guardarCarrito'])->name('guardar.carrito');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminarCarrito'])->name('eliminar.carrito');
    Route::get('/carrito/pagar', [CarritoController::class, 'pagarCarrito'])->name('carrito.pagar');
    Route::get('/premios', [ProductoController::class, 'premios'])->name('premios');
    Route::post('/premios/canjear', [ProductoController::class, 'canjearProducto'])->name('canjear.premio');


    // o si prefieres usar PUT
// Route::put('/carrito/{id}', [CarritoController::class, 'guardarCarrito'])->name('guardar.carrito');


    Route::get('/perfil', function () {
        return view('user.perfil');
    })->name('perfil');

});

