@extends('layouts.app')

@section('title', 'usuario')

@section('content')
    <section>
        <h2>Aqui vamos a mostar el intefas de ingresar y crear cuenta</h2>

        <hr>
        @foreach ($lista as $usuarios)
            <strong>{{ $usuarios->{'usuario-nombre'} }}</strong>
            <br>
            {{ $usuarios->{'usuario-apellido'} }}
            <br />
            {{ $usuarios->{'email'} }}
            <br />
            {{ $usuarios->{'usuario-clave'} }}
            <br />
            {{ $usuarios->{'usuario-id'} }}
            <br />
            <br />
            <br />

            <hr>
        @endforeach


    </section>
@endsection
