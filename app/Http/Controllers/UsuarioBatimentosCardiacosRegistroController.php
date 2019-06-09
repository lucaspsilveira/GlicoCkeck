<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioBatimentosCardiacosRegistro;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UsuarioBatimentosCardiacosRegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request) {
        $request['id_usuario'] = Auth::user()->id;
        $dados = request()->validate([
            'id_usuario' => 'exists:users,id',
            'batimentos_cardiacos' => 'required',
        ]);
        UsuarioBatimentosCardiacosRegistro::create($dados);
        return redirect('UsuarioBatimentosRegistros');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = UsuarioBatimentosCardiacosRegistro::where("id_usuario",Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('usuarioBatimentosCardiacosRegistro.index', [
            'registrosBatimentosCardiacos' => $registros
        ]);
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarioBatimentosCardiacosRegistro.create');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = UsuarioBatimentosCardiacosRegistro::find($id);
        $registro->delete();
        return redirect('/UsuarioBatimentosRegistros');
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = UsuarioBatimentosCardiacosRegistro::find($id);
        return view('usuarioBatimentosCardiacosRegistro.edit', compact('registro'));
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
        $registro = UsuarioBatimentosCardiacosRegistro::find($id);
        $dados = request()->validate([
            'batimentos_cardiacos' => 'required',
            'created_at' => 'required'
        ]);
        $registro->update($dados);
        return redirect('/UsuarioBatimentosRegistros');
    }
}
