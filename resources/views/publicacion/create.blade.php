@extends('layouts.app')

@section('title', 'Publicacion de blog')

@section('content')
    <div class="" style="margin-left: 8rem;margin-right: 15rem">
        <div class="mb-3">
            <form class="mb-3" action="{{ url('/publicacion') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="titulo">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contenido</label>
                    <input type="textarea" class="form-control" id="exampleInputPassword1" name="contenido">
                </div>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </div>
    </div>
@endsection
