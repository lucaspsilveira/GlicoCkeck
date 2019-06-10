<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioGlicoseRegistro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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
     * Mostra o formulário para editar um registro de GLICOSE
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = UsuarioGlicoseRegistro::find($id);
        return view('usuarioGlicoseRegistro.edit', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   
        //$request["created_at"] = Carbon::parse($request["created_at"]);
        $date = str_replace('/', '-', $request["created_at"] );
        $newDate = date("Y-m-d H:i:s", strtotime($date));
        $request["created_at"] = $newDate;
        $registro = UsuarioGlicoseRegistro::find($id);
        $dados = request()->validate([
            'glicose' => 'required',
            'created_at' => 'required'
        ]);
        $registro->update($dados);
        return redirect('/UsuarioGlicoseRegistros');
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
