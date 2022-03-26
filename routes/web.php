<?php

use App\Http\Controllers\{
    PetController
};
use Illuminate\Support\Facades\Route;

Route::get('/pets', [PetController::class, 'viewPets'])->name('pets.viewPets');

Route::get('/pets/novo-pet', [PetController::class, 'viewCreate'])->name('pets.viewCreate');

Route::get('/pets/editar/{id}', [PetController::class, 'show'])->name('pets.show');

Route::get('/', function () {
    return view('welcome');
});
