<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePet;
use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function getAll(){

        $pets = Pet::get();

        return $pets;
    }

    public function findById($id){

        if(!$pet = Pet::find($id)) return response()->json(['message' => 'Pet not found!'], 404);

        return $pet;
    }

    public function viewPets(){

        $pets = PetController::getAll();

        return view('admin.pets.index', ['pets' => $pets]);
    }

    public function viewCreate(){

        $owners = Owner::get();

        return view('admin.pets.create', ['owners' => $owners]);
    }

    public function create(CreatePet $req){

        Pet::create([
            'name' => $req->name,
            'age' => $req->age,
            'type' => $req->type,
            'breed' => $req->breed,
            'id_owner' => $req->ownerId
        ]);

        return redirect()->route('pets.viewPets');
    }

    public function edit(CreatePet $req, $id){

        $pet = Pet::find($id);

        $pet->update($req->all());

        return redirect()
        ->route('pets.viewPets')
        ->with('messageUpdate', "Pet atualizado com sucesso!");
    }

    public function delete($id){

        if(!$pet = Pet::find($id)) return response()->json(['message' => 'Pet not found!'], 404);

        $pet->delete();

        return redirect()
            ->route('pets.viewPets')
            ->with('messageDelete', 'Pet deletado com sucesso!');
    }

    public function show($id){

        if(!$pet = Pet::find($id)) return response()->json(['message' => 'Pet not found!'], 404);

        return view('admin.pets.edit', compact('pet'));
    }
}
