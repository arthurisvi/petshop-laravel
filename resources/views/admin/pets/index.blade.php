<h1>Pets</h1>

<a href="{{ route('pets.viewCreate') }}">Cadastrar novo Pet</a>

<form action="{{ route('pets.search') }}" method="post">
    @csrf
    <select name = "type" id = "type">
        <option selected disabled>Tipo</option>
        <option value = "Gato">Gato</option>
        <option value = "Cachorro">Cachorro</option>
    </select>
    <button type = "submit">Filtrar</button>
</form>

@if(session('messageDelete') || session('updateMessage'))
    @if(session('messageDelete'))
    <div>
        {{ session('messageDelete') }}
    </div>
    @endif
    @if(session('updateMessage'))
    <div>
        {{ session('updateMessage') }}
    </div>
    @endif
@endif

@foreach ($pets as $pet)
    <p>{{ $pet->name }}</p>

    <form action="{{ route('pets.delete', $pet->id)}}" method = "post">
    @csrf
    @method("delete")
    <button type = "submit">Excluir</button>
    </form>

    <a href="{{ route('pets.show', $pet->id) }}"><button >Editar</button></a>
@endforeach

<hr>

@if (isset($filters))
{{ $pets->appends($filters)->links() }}
@else
{{ $pets->links() }}
@endif
