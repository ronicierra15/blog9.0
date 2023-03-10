@extends('layouts.app')

@section('title', 'blog-0.9')

@section('content')
    <section>
        <h2>Aqui vamos a mostar las publicacion, este el index del post</h2>
    </section>
    @php
        $usuarios = isset($usuarios) ? $usuarios : null;
    @endphp

    <hr>
    @foreach ($ListaDePublicaciones as $publicacion)
        <strong>{{ $publicacion->{'titulo'} }}</strong>
        <br>
        {{ $publicacion->{'public'} }}
        <br />
        <br />
        <h3>Creado por: {{ $publicacion->nombre }} {{ $publicacion->apellido }}</h3>
        <br />

        @if (Auth::check() && Auth::user()->{'id'} == $publicacion->{'usuario-id'})
            <form action="{{ url('publicacion/' . $publicacion->{'id'}) }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit">Eliminar</button>
            </form>
            <form action="{{ url('publicacion/' . $publicacion->{'id'}) . '/edit' }} " method="GET">
                @method('edit')
                @csrf
                <button type="submit">Actualizar</button>
            </form>
        @endif

        <hr>
    @endforeach

@endsection
