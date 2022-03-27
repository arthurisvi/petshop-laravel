<div>
    <h1>Cadastrar Pet</h1>
    <div>
        <h2>Pet</h2>

        @include ('admin.pets._partials.exception')

        <form action=" {{ route('pets.create') }}" method="post">
            @csrf
            <input type="text" name="name" id="name" placeholder = "Nome" value="{{old('name')}}">
            <input type="number" name="age" id="age" placeholder = "Idade" value="{{old('age')}}">
            <select name = "type" id = "type">
                <option selected disabled>Tipo</option>
                <option value = "Gato">Gato</option>
                <option value = "Cachorro">Cachorro</option>
            </select>
            <input type="text" name="breed" id="breed" placeholder = "Raça" value="{{old('breed')}}">


            <select name = "ownerId" name = "ownerId">
                <option selected disabled>Dono</option>
                @foreach ($owners as $owner)
                <option value = {{ $owner->id }}>{{ $owner->name }} - Tel: {{ $owner->tel }}</option>
                @endforeach
            </select>

            <button type ="submit">Cadastrar</button>
        </form>
    </div>
</div>




