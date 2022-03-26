<h1>Editar Pet</h1>

@if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
@endif

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
        <button type = "submit">Salvar</button>
    </form>
    <a href="{{ route('pets.viewPets') }}"><button>Cancelar</button></a>
</div>



