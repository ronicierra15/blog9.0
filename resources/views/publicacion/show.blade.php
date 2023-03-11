@extends('layouts.app')
@section('title', 'Visualizacion de cada publicacion')
@section('content')
    <div class="" style="margin-left: 8rem;margin-right: 22rem;border-right: 1px solid rgb(189, 189, 189);">
        <h2><a {{ url('publicacion/' . $ListaDePublicaciones->{'id'}) }}>{{ $ListaDePublicaciones->{'titulo'} }}</a>
        </h2>
        {{ $ListaDePublicaciones->{'public'} }}
        <br />
        <br />
        <strong>Creado por: {{ $ListaDePublicaciones->nombre }} {{ $ListaDePublicaciones->apellido }}</strong>
        <br />
        <div class="row justify-content-center">
            <div class="col-auto">
                @if (Auth::check() && Auth::user()->{'id'} == $ListaDePublicaciones->{'usuario-id'})
                    <form class="btn btn-primary" class="btn btn-primary"
                        style="border-style:none;border-radius:50px; background-color:rgb(141, 189, 147)"
                        action="{{ url('publicacion/' . $ListaDePublicaciones->{'id'}) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button style="border: none; background-color: transparent" type="submit">Eliminar</button>
                    </form>
                    <form class="btn btn-primary"
                        style="border-style:none;border-radius:50px; background-color:rgb(141, 189, 147)"
                        action="{{ url('publicacion/' . $ListaDePublicaciones->{'id'}) . '/edit' }} " method="GET">
                        @method('edit')
                        @csrf
                        <button style="border: none; background-color: transparent"type="submit">Actualizar</button>
                    </form>
                @endif
            </div>
        </div>
        <hr>
    </div>
@endsection
