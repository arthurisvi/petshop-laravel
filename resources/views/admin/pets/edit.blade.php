<h1>Editar Pet</h1>

@include ('admin.pets._partials.exception')

<div>
    <form action=" {{ route('pets.edit', $pet->id) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" id="name" placeholder = "Nome" value="{{ $pet->name }}">
        <input type="number" name="age" id="age" placeholder = "Idade" value="{{ $pet->age }}">
        <select name = "type" id = "type" >
            @if($pet->type == "Gato")
            <option value="{{ $pet->type }}">{{ $pet->type }}</option>
            <option value = "Cachorro">Cachorro</option>
            @endif
            @if($pet->type == "Cachorro")
            <option value="{{ $pet->type }}">{{ $pet->type }}</option>
            <option value = "Gato">Gato</option>
            @endif
        </select>
        <input type="text" name="breed" id="breed" placeholder = "Raça" value="{{ $pet->breed }}">
        <select name = "ownerId" name = "ownerId">
            @foreach ($owners as $owner)
            @foreach ($pet as $pets)
            @if ($pet->id == $owner->id)
            <option selected value = {{ $owner->id}}>{{ $owner->name }}</option>
            @endif()
            @endforeach
            <option value = {{ $owner->id }}>{{ $owner->name }} - Tel: {{ $owner->tel }}</option>
            @endforeach
        </select>
        <button type = "submit">Salvar</button>
    </form>
    <a href="{{ route('pets.viewPets') }}"><button>Cancelar</button></a>
</div>



