@extends('layouts.app')

@section('title', 'usuario')

@section('content')
    <section>
        <h2>Aqui vamos a mostar el intefas de ingresar y crear cuenta</h2>

        <hr>
        @foreach ($ListaDeUsuarios as $usuarios)
            <strong>{{ $usuarios->{'nombre'} }}</strong>
            <br>
            {{ $usuarios->{'apellido'} }}
            <br />
            {{ $usuarios->{'email'} }}
            <br />
            {{ $usuarios->{'clave'} }}
            <br />
            {{ $usuarios->{'id'} }}
            <br />
            <br />
            <br />

            <hr>
        @endforeach


    </section>
@endsection
