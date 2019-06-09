<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioPesoRegistro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UsuarioPesoRegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request) {
        $request['id_usuario'] = Auth::user()->id;
        $dados = request()->validate([
            'id_usuario' => 'required|exists:users,id',
            'peso' => 'required',
            'unidade' => 'required',
        ]);
        UsuarioPesoRegistro::create($dados);
        return redirect('UsuarioPesoRegistros');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = UsuarioPesoRegistro::where("id_usuario",Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('usuarioPesoRegistro.index', [
            'registrosPeso' => $registros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarioPesoRegistro.create');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = UsuarioPesoRegistro::find($id);
        $registro->delete();
        return redirect('/UsuarioPesoRegistros');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   
        $request["created_at"] = Carbon::parse($request["created_at"]);
        $registro = UsuarioPesoRegistro::find($id);
        $dados = request()->validate([
            'peso' => 'required',
            'unidade' => 'required',
            'created_at' => 'required'
        ]);
        $registro->update($dados);
        return redirect('/UsuarioPesoRegistros');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = UsuarioPesoRegistro::find($id);
        return view('usuarioPesoRegistro.edit', compact('registro'));
    }
}
