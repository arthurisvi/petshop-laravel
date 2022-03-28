<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePet;
use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function getAll(){

        $pets = Pet::latest()->paginate();

        return response()->json($pets);
    }

    public function findById($id){

        if(!$pet = Pet::find($id)) return response()->json(['message' => 'Pet not found!'], 404);

        return response()->json($pet);
    }

    public function findByType(Request $req){

        $pets = Pet::where('type', $req->type)->paginate();

        return response()->json($pets);
    }

    public function getPetsPerOwner($id){

        if(!$owner = Owner::find($id)) return response()->json(['message' => 'Owner not found!'], 404);

        $pets = Pet::where('id_owner', $id)->paginate();

        if(!response()->json($pets)->getData()->data) return response()->json(['message' => 'This owner has no registered pets!'], 404);

        return response()->json($pets);
    }

    public function viewPetsFiltered(Request $req){

        $filters = $req->type;
        $pets = PetController::findByType($req)->getData()->data;

        return view ('admin.pets.index', compact ('pets', 'filters'));
    }

    public function viewPets(){

        $pets = PetController::getAll()->getData()->data;

        return view('admin.pets.index', ['pets' => $pets]);
    }

    public function viewCreate(){

        $owners = Owner::get();

        return view('admin.pets.create', ['owners' => $owners]);
    }

    public function create(CreatePet $req){

        $pet = Pet::create([
            'name' => $req->name,
            'age' => $req->age,
            'type' => $req->type,
            'breed' => $req->breed,
            'id_owner' => $req->ownerId
        ]);

        return response()->json($pet);
    }

    public function createWeb(CreatePet $req){

        Pet::create([
            'name' => $req->name,
            'age' => $req->age,
            'type' => $req->type,
            'breed' => $req->breed,
            'id_owner' => $req->ownerId
        ]);

        return $this->viewPets();
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

        $owners = Owner::get();

        if(!$pet = Pet::find($id)) return response()->json(['message' => 'Pet not found!'], 404);

        return view('admin.pets.edit', compact('pet', 'owners'));
    }
}
