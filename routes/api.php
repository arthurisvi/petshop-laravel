<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PetController
};

Route::post('/pets', [PetController::class, 'create'])->name('pets.create');

Route::get('/pets', [PetController::class, 'getAll'])->name('pets.getAll');

Route::get('/pets/{id}', [PetController::class, 'findById'])->name('pets.findById');

Route::delete('/pets/{id}', [PetController::class, 'delete'])->name("pets.delete");

Route::put('/pets/{id}', [PetController::class, 'edit'])->name("pets.edit");

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
