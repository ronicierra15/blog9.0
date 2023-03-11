@extends('layouts.app')

@section('title', 'blog-0.9')

@section('content')
    <div class="" style="margin-left: 8rem;margin-right: 22rem;border-right: 1px solid rgb(189, 189, 189);">
        @foreach ($ListaDePublicaciones as $publicacion)
            <h2><a
                    style="text-decoration: none;color:black"href="{{ url('publicacion/' . $publicacion->{'id'}) }}">{{ $publicacion->{'titulo'} }}</a>
            </h2>
            {{ substr($publicacion->{'public'}, 0, 200) }}{{ strlen($publicacion->{'public'}) > 200 ? '...' : '' }}
            <br />
            <br />
            <strong>Creado por: {{ $publicacion->nombre }} {{ $publicacion->apellido }}</strong>
            <br />

            <div class="row justify-content-center">
                <div class="col-auto">
                    @if (Auth::check() && Auth::user()->{'id'} == $publicacion->{'usuario-id'})
                        <form class="btn btn-primary" class="btn btn-primary"
                            style="border-style:none;border-radius:50px; background-color:rgb(141, 189, 147)"
                            action="{{ url('publicacion/' . $publicacion->{'id'}) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button style="border: none; background-color: transparent" type="submit">Eliminar</button>
                        </form>
                        <form class="btn btn-primary"
                            style="border-style:none;border-radius:50px; background-color:rgb(141, 189, 147)"
                            action="{{ url('publicacion/' . $publicacion->{'id'}) . '/edit' }} " method="GET">
                            @method('edit')
                            @csrf
                            <button style="border: none; background-color: transparent"type="submit">Actualizar</button>
                        </form>
                    @endif
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
