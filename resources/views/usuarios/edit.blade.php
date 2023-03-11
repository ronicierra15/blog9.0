@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')
    <div class="" style="margin-left: 8rem;margin-right: 22rem">
        <div class="mb-3">
            <form class="mb-3" action="{{ url('usuarios/' . $users->{'id'}) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <strong>
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    </strong>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="nombre" value="{{ old('nombre', $users->{'nombre'}) }}">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <strong>
                        <label for="exampleInputEmail1" class="form-label">Apellido</label>
                    </strong>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="apellido" value="{{ old('apellido', $users->{'apellido'}) }}">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <strong>
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <strong>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="correo" value="{{ old('correo', $users->{'email'}) }}">
                            <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <strong>
                        <label for="exampleInputPassword1" class="form-label">contraseña actual</label>
                    </strong>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña">
                </div>

                <div class="mb-3">
                    <strong>
                        <label for="exampleInputPassword1" class="form-label">Nueva contraseña</label>
                    </strong>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña">
                </div>

                <div class="mb-3">
                    <strong>
                        <label for="exampleInputPassword1" class="form-label">Repite nueva contraseña</label>
                    </strong>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
