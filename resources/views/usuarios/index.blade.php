@extends('layouts.app')

@section('title', 'Edital perfil')

@section('content')
    <div class="" style="margin-left: 8rem;margin-right: 22rem">
        <h2>Editar perfil</h2>
        @foreach ($ListaDeUsuarios as $usuarios)
            @if (Auth::check() && Auth::user()->{'id'} == $usuarios->{'id'})
                <div class="mb-3">
                    <strong>
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    </strong>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="titulo" value="{{ old('nombre', $usuarios->{'nombre'}) }}">
                    <div id="emailHelp" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <strong>
                        <label for="exampleInputEmail1" class="form-label">Apellido</label>
                    </strong>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="titulo" value="{{ old('apellido', $usuarios->{'apellido'}) }}">
                    <div id="emailHelp" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <strong>
                        <label for="exampleInputEmail1" class="form-label">Correo</label>
                    </strong>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="titulo" value="{{ old('email', $usuarios->{'email'}) }}">
                    <div id="emailHelp" class="form-text"></div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-auto">
                        <form class="btn btn-primary" class="btn btn-primary"
                            style="border-style:none;border-radius:50px; background-color:rgb(141, 189, 147)"
                            action="{{ url('usuarios/' . $usuarios->{'id'}) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button style="border: none; background-color: transparent" type="submit">Eliminar</button>
                        </form>
                        <form class="btn btn-primary" class="btn btn-primary"
                            style="border-style:none;border-radius:50px; background-color:rgb(141, 189, 147)"
                            action="{{ url('usuarios/' . $usuarios->{'id'}) . '/edit' }} " method="GET">
                            @method('edit')
                            @csrf
                            <button style="border: none; background-color: transparent" type="submit">Actualizar</button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
