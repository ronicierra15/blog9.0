@extends('layouts.app')

@section('title', 'intermedia')

@section('content')
    <section>
        <h2>Aqui vamos a mostar las publicacion, este el index del post</h2>
    </section>

    <hr>
    @foreach ($lista as $publicacion)
        <strong>{{ $publicacion->{'post-titulo'} }}</strong>
        <br>
        {{ $publicacion->{'post-public'} }}
        <br />
        <br />
        <h3>Creado por: {{ $publicacion->usuario_nombre }}</h3>
        <br />

        <form action="{{ url('publicacion/' . $publicacion->{'post-id'}) }}" method="POST">
            @method('delete')
            @csrf
            <button type="submit">Eliminar</button>
        </form>
        <form action="{{ url('publicacion/' . $publicacion->{'post-id'}) . '/edit' }} " method="GET">
            @method('edit')
            @csrf
            <button type="submit">Actualizar</button>
        </form>
        <hr>
    @endforeach

@endsection
