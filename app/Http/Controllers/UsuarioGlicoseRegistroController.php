<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioGlicoseRegistro;
use Illuminate\Support\Facades\Auth;

class UsuarioGlicoseRegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request['id_usuario'] = Auth::user()->id;
        $dados = request()->validate([
            'id_usuario' => 'required|exists:users,id',
            'glicose' => 'required'
        ]);
        UsuarioGlicoseRegistro::create($dados);
        return redirect("UsuarioGlicoseRegistros");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = UsuarioGlicoseRegistro::where("id_usuario",Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('usuarioGlicoseRegistro.index', [
            'registrosGlicose' => $registros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarioGlicoseRegistro.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UsuarioGlicoseRegistro $usuarioGlicoseRegistro)
    {
        return view('usuarioRegistroGlicose.show', compact('usuarioGlicoseRegistro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UsuarioGlicoseRegistro $usuarioGlicoseRegistro)
    {
        return view('usuarioRegistroGlicose.edit', compact('usuarioGlicoseRegistro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioGlicoseRegistro $usuarioGlicoseRegistro)
    {
        $usuarioGlicoseRegistro->update([
            'glicose'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = UsuarioGlicoseRegistro::find($id);
        $registro->delete();
        return redirect('/UsuarioGlicoseRegistros');
    }
}
