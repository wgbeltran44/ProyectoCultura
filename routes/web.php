<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ObraController;

/*
|-------------------------
| PUBLIC
|-------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|-------------------------
| AUTH USERS (TODO LO NORMAL)
|-------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    | Dashboard
    */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    | Perfil
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/mi-perfil', function () {
        return view('profile.show', [
            'user' => auth()->user()
        ]);
    })->name('profile.show');

    /*
    | Cultura (tus vistas normales)
    */
    Route::get('/tradiciones', function () {
        return view('tradiciones');
    })->name('tradiciones');

    Route::get('/gastronomia', function () {
        return view('gastronomia');
    })->name('gastronomia');

    Route::get('/turismo', function () {
        return view('turismo');
    })->name('turismo');

    /*
    | CRUD OBRAS (MANTENIDO, SOLO UNA VEZ)
    */
    Route::resource('obras', ObraController::class);

});

/*
|-------------------------
| ADMIN (SOLO ADMIN)
|-------------------------
*/

Route::middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/admin/usuarios', [UserController::class, 'index'])
        ->name('admin.usuarios');

    Route::put('/admin/usuarios/{id}/role', [UserController::class, 'updateRole'])
        ->name('admin.usuarios.role');

    Route::delete('/admin/usuarios/{id}', [UserController::class, 'delete'])
        ->name('admin.usuarios.delete');
});

/*
|-------------------------
| AUTH
|-------------------------
*/

require __DIR__.'/auth.php';