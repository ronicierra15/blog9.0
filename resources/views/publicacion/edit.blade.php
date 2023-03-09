@extends('layouts.app')

@section('title', 'editar post')

@section('content')
    <section>
        <div class="mb-3">
            <form class="mb-3" action="{{ url('publicacion/' . $post->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="titulo" value="{{ old('titulo', $post->{'titulo'}) }}">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contenido</label>
                    <input type="textarea" class="form-control" id="exampleInputPassword1" name="contenido"
                        value="{{ old('contenido', $post->{'public'}) }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection
