<h1>Teste</h1>

<a href="{{ route('pets.viewCreate') }}">Cadastrar novo Pet</a>

@if(session('messageDelete'))
    <div>
        {{ session('messageDelete') }}
    </div>
@endif

@foreach ($pets as $pet)
    <p>{{ $pet->name }}</p>

    <form action="{{ route('pets.delete', $pet->id)}}" method = "post">
    @csrf
    @method("delete")
    <button type = "submit">Excluir</button>
    </form>
@endforeach
