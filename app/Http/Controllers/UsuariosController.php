<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        $usuarios = DB::table('users')->get();
        return view('usuarios.index', ['ListaDeUsuarios' => $usuarios]);
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

        $usuarios = new User();
        $usuarios->{'nombre'} = $request->input('nombre');
        $usuarios->{'apellido'} = $request->input('apellido');
        $usuarios->{'email'} = $request->input('correo');
        $usuarios->{'clave'} = Hash::make($request->input('contraseña'));
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
        $usuarios = DB::table('users')->get();
        return view('usuarios.edit', ['users' => User::where('id', $id)->first()]);
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
            'correo' => 'required|email|unique:users,email,' . $id . ',id',
            'contraseña' => 'required',
        ]);

        $usuarios = User::where('id', $id)->first();
        $usuarios->{'nombre'} = $request->input('nombre');
        $usuarios->{'apellido'} = $request->input('apellido');
        $usuarios->{'email'} = $request->input('correo');
        $usuarios->{'clave'} = Hash::make($request->input('contraseña'));
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
        $usuarios = User::where('id', $id)->first();
        $usuarios->delete();
        return 'Usuario eliminado';
    }
}
