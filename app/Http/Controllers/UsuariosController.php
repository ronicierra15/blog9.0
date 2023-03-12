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
        return redirect()
            ->route('usuarios.edit', ['usuario' => $id])
            ->with('message', 'Usuario modificada correctamente');
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
        $usuarios->{'password'} = Hash::make($request->input('contraseña'));
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
        ]);

        $usuarios = User::where('id', $id)->first();
        $usuarios->{'nombre'} = $request->input('nombre');
        $usuarios->{'apellido'} = $request->input('apellido');
        $usuarios->{'email'} = $request->input('correo');
        if (empty($request->input('contraseñaActual'))) {
            return redirect()
                ->route('usuarios.edit', ['usuario' => $id])
                ->with('messageError', 'Debes introducir la contraseña actual para realizar cambios');
        } else {
            if (Auth::attempt(['email' => $usuarios->email, 'password' => $request->contraseñaActual])) {
                if ($request->input('contraseñaNueva') == $request->input('contraseñaRepite')) {
                    $usuarios->{'password'} = Hash::make($request->input('contraseñaRepite'));
                    $usuarios->save();
                    return redirect()
                        ->route('usuarios.edit', ['usuario' => $id])
                        ->with('message', 'Usuario modificada correctamente');
                } else {
                    return redirect()
                        ->route('usuarios.edit', ['usuario' => $id])
                        ->with('messageError', 'La nueva clave ingresada no coincide');
                }
            } else {
                return redirect()
                    ->route('usuarios.edit', ['usuario' => $id])
                    ->with('messageError', 'La contraseña actual no coincide');
            }
        }
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

        return redirect()
            ->route('publicacion.index')
            ->with('message', 'Usuario eliminado correctamente');
        return 'Usuario eliminado';
    }
}
