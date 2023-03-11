<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\publications;
use App\Models\blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $publicaciones = DB::table('post')
            ->join('users', 'post.usuario-id', '=', 'users.id')
            ->get(['post.*', 'users.nombre', 'users.apellido']);
        // dd($publicaciones);
        return view('publicacion.index', ['ListaDePublicaciones' => $publicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publicacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        $post = new Publications();
        $post->{'titulo'} = $request->input('titulo');
        $post->{'public'} = $request->input('contenido');
        $post->{'usuario-id'} = Auth::user()->{'id'}; // Obtiene el usuario_id del usuario autenticado
        $post->save();
        return view('publicacion.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacion = DB::table('post')
            ->join('users', 'post.usuario-id', '=', 'users.id')
            ->where('post.id', $id)
            ->first(['post.*', 'users.nombre', 'users.apellido']);

        return view('publicacion.show', ['ListaDePublicaciones' => $publicacion]);
    }

    // public function intermedia()
    // {
    //     $publicacion = Publicacion::findOrFail($id);
    //     return view('publicacion.intermedia', compact('publicacion'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('publicacion.edit', ['post' => publications::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion = $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        $post = publications::where('id', $id)->first();
        $post->{'titulo'} = $request->input('titulo');
        $post->{'public'} = $request->input('contenido');
        $post->save();
        return 'Publicacion modificada';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = publications::where('id', $id)->first();
        $post->delete();
        return 'Registro ELIMINADO';
    }
}
