<?php

 use App\Http\Middleware\CheckAdmin;
// use App\Mail\DiscoReservation;
use Illuminate\Support\Facades\Route;

// Este archivo maneja todas las urls

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('auth.login.form');

Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginProcess'])
    ->name('auth.login.process');

Route::get('/registrarse', [\App\Http\Controllers\AuthController::class, 'registerForm'])
    ->name('auth.register.form');

Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logoutProcess'])
    ->name('auth.logout.process');

Route::prefix('/discos')->group(function() {
    Route::get('/', [\App\Http\Controllers\DiscosController::class, 'all'])
        ->name('discos.index');

    Route::get('/{id}', [App\Http\Controllers\DiscosController::class, 'view'])
        ->name('discos.view')
        ->whereNumber('id');

    Route::get('/nuevo', [App\Http\Controllers\DiscosController::class, 'createForm'])
        ->name('discos.create.form')
        //->middleware('auth');
        ->middleware(App\Http\Middleware\CheckAdmin::class);

    Route::post('/nuevo', [App\Http\Controllers\DiscosController::class, 'createProcess'])
        ->name('discos.create.process')
        //->middleware('auth');
        ->middleware(App\Http\Middleware\CheckAdmin::class);

    Route::get('/{id}/editar', [\App\Http\Controllers\DiscosController::class, 'editForm'])
        ->name('discos.edit.form')
        ->whereNumber('id')
        //->middleware('auth');
        ->middleware(App\Http\Middleware\CheckAdmin::class);

    Route::post('/{id}/editar', [\App\Http\Controllers\DiscosController::class, 'editProcess'])
        ->name('discos.edit.process')
        ->whereNumber('id')
        //->middleware('auth');
        ->middleware(App\Http\Middleware\CheckAdmin::class);

    Route::get('/{id}/eliminar', [\App\Http\Controllers\DiscosController::class, 'deleteForm'])
        ->name('discos.delete.form')
        ->whereNumber('id')
        //->middleware('auth');
        ->middleware(App\Http\Middleware\CheckAdmin::class);

    Route::post('/{id}/eliminar', [App\Http\Controllers\DiscosController::class, 'deleteProcess'])
        ->name('discos.delete.process')
        //->middleware('auth');
        ->middleware(App\Http\Middleware\CheckAdmin::class);

    Route::post('/{id}/reservar', [\App\Http\Controllers\DiscoReservationController::class, 'reserve'])
        ->name('discos.reserve')
        ->middleware('auth');

    Route::get('/verificar-admin', [App\Http\Controllers\AdminVerificationController::class, 'confirmForm'])
        ->name('discos.check-admin.form');

    Route::get('/verificar-admin', [App\Http\Controllers\AdminVerificationController::class, 'confirmProcess'])
        ->name('discos.check-admin.process');
});

Route::prefix('/blog')->group(function() {
    Route::get('/', [\App\Http\Controllers\BlogController::class, 'bringAll'])
    ->name('blog.index');

    Route::get('/{id}', [\App\Http\Controllers\BlogController::class, 'view'])
        ->name('blog.view')
        ->whereNumber('id');

    Route::get('/nuevo', [\App\Http\Controllers\BlogController::class, 'createForm'])
        ->name('blog.create.form')
        ->middleware('auth');

    Route::post('/nuevo', [App\Http\Controllers\BlogController::class, 'createProcess'])
        ->name('blog.create.process')
        ->middleware('auth');

    Route::get('/{id}/editar', [\App\Http\Controllers\BlogController::class, 'editForm'])
        ->name('blog.edit.form')
        ->whereNumber('id')
        ->middleware('auth');

    Route::post('/{id}/editar', [\App\Http\Controllers\BlogController::class, 'editProcess'])
        ->name('blog.edit.process')
        ->whereNumber('id')
        ->middleware('auth');

    Route::get('/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'deleteForm'])
        ->name('blog.delete.form')
        ->whereNumber('id')
        ->middleware('auth');

    Route::post('/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'deleteProcess'])
        ->name('blog.delete.process')
        ->whereNumber('id')
        ->middleware('auth');
});

Route::prefix('/usuarios')->group(function() {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'all'])
        ->name('users.index')
        ->middleware('auth');

    Route::get('/nuevo', [App\Http\Controllers\UserController::class, 'createForm'])
        ->name('users.create.form')
        ->middleware('auth');

    Route::post('/nuevo', [App\Http\Controllers\UserController::class, 'createProcess'])
        ->name('users.create.process')
        ->middleware('auth');

    Route::get('/{id}', [App\Http\Controllers\UserController::class, 'view'])
        ->name('users.view')
        ->whereNumber('id')
        //->middleware('auth');
        ->middleware(App\Http\Middleware\CheckAdmin::class);

    Route::get('/{id}/editar', [\App\Http\Controllers\UserController::class, 'editForm'])
        ->name('users.edit.form')
        ->whereNumber('id')
        ->middleware('auth');

    Route::post('/{id}/editar', [\App\Http\Controllers\UserController::class, 'editProcess'])
        ->name('users.edit.process')
        ->whereNumber('id')
        ->middleware('auth');
});

Route::get('/perfil', [\App\Http\Controllers\UserProfileController::class, 'show'])
    ->name('users.profile');

Route::get('/carrito', [\App\Http\Controllers\CartController::class, 'index'])
    ->name('cart.index');

Route::post('/discos/{id}/reservar', [\App\Http\Controllers\DiscoReservationController::class, 'reserve'])
    ->name('discos.reserve')
    ->middleware('auth');

Route::get('/emails/test/reserva-disco', [\App\Http\Controllers\DiscoReservationController::class, 'show'])
    ->name('discos.reserve.show')
    ->middleware('auth');

Route::get('/test/mercadopago', [\App\Http\Controllers\MercadoPagoController::class, 'show'])
    ->name('test.mercadopago.show');

Route::get('/test/mercadopago/success', [\App\Http\Controllers\MercadoPagoController::class, 'successProcess'])
    ->name('test.mercadopago.successProcess');
Route::get('/test/mercadopago/pending', [\App\Http\Controllers\MercadoPagoController::class, 'pendingProcess'])
    ->name('test.mercadopago.pendingProcess');
Route::get('/test/mercadopago/failure', [\App\Http\Controllers\MercadoPagoController::class, 'failureProcess'])
    ->name('test.mercadopago.failureProcess');

