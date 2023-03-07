<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = DB::table('usuarios')->get();
        return view('usuarios.index', ['lista' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
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
            'nombre' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
        ]);

        $usuarios = new blog();
        $usuarios->{'usuario-nombre'} = $request->input('nombre');
        $usuarios->{'usuario-apellido'} = $request->input('apellido');
        $usuarios->{'usuario-correo'} = $request->input('correo');
        $usuarios->{'usuario-clave'} = Hash::make($request->input('contraseña'));
        $usuarios->save();
        return view('usuarios.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = DB::table('usuarios')->get();
        return view('usuarios.edit', ['usuarios' => blog::where('usuario-id', $id)->first()]);
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
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:usuarios,usuario-correo,' . $id . ',usuario-id',
            'contraseña' => 'required',
        ]);

        $usuarios = blog::where('usuario-id', $id)->first();
        $usuarios->{'usuario-nombre'} = $request->input('nombre');
        $usuarios->{'usuario-apellido'} = $request->input('apellido');
        $usuarios->{'usuario-correo'} = $request->input('correo');
        $usuarios->{'usuario-clave'} = $request->input('contraseña');
        $usuarios->save();
        return 'usuario modificado';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
