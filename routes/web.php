<?php

use App\Http\Controllers\{
    PetController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (){

    Route::get('/pets', [PetController::class, 'viewPets'])->name('pets.viewPets');

    Route::get('/pets/novo-pet', [PetController::class, 'viewCreate'])->name('pets.viewCreate');

    Route::any('/pets/buscar-por-tipo', [PetController::class, 'viewPetsFiltered'])->name('pets.search');

    Route::get('/pets/editar/{id}', [PetController::class, 'show'])->name('pets.show');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
