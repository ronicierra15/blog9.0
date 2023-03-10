@extends('layouts.app')

@section('title', 'blog-0.9')

@section('content')
    <section>
        <h2>Publicaciones</h2>
    </section>
    @php
        $usuarios = isset($usuarios) ? $usuarios : null;
    @endphp

    <hr>
    @foreach ($ListaDePublicaciones as $publicacion)
        <h2>{{ $publicacion->{'titulo'} }}</h2>
        {{ $publicacion->{'public'} }}
        <br />
        <br />
        <strong>Creado por: {{ $publicacion->nombre }} {{ $publicacion->apellido }}</strong>
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
