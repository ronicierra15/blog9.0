@extends('layouts.app')

@section('title', 'Edital perfil')

@section('content')
    <section>
        <h2>Editar perfil</h2>
        @foreach ($ListaDeUsuarios as $usuarios)
            @if (Auth::check() && Auth::user()->{'id'} == $usuarios->{'id'})
                <strong>Nombre:</strong>
                {{ $usuarios->{'nombre'} }}
                <br>
                <strong>Apellido:</strong>
                {{ $usuarios->{'apellido'} }}
                <br />
                <strong>Correo:</strong>
                {{ $usuarios->{'email'} }}
                <br />
                <form action="{{ url('usuarios/' . $usuarios->{'id'}) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit">Eliminar</button>
                </form>
                <form action="{{ url('usuarios/' . $usuarios->{'id'}) . '/edit' }} " method="GET">
                    @method('edit')
                    @csrf
                    <button type="submit">Actualizar</button>
                </form>
            @endif
        @endforeach
    </section>
@endsection
