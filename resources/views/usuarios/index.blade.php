@extends('layouts.app')

@section('title', 'usuario')

@section('content')
    <section>
        <h2>Aqui vamos a mostar el intefas de ingresar y crear cuenta</h2>

        <hr>
        @foreach ($ListaDeUsuarios as $usuarios)
            <strong>Nombre:</strong>
            {{ $usuarios->{'nombre'} }}
            <br>
            <strong>Apellido:</strong>
            {{ $usuarios->{'apellido'} }}
            <br />
            <strong>Correo:</strong>
            {{ $usuarios->{'email'} }}
            <br />
            @if (Auth::check() && Auth::user()->{'id'} == $usuarios->{'id'})
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
            <br />

            <hr>
        @endforeach


    </section>
@endsection
