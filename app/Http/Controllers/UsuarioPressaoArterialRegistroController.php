<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioPressaoArterialRegistro;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UsuarioPressaoArterialRegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request) {
        $request['id_usuario'] = Auth::user()->id;
        $dados = request()->validate([
            'id_usuario' => 'exists:users,id',
            'pressao_arterial_sistolica' => 'required',
            'pressao_arterial_diastolica' => 'required',
        ]);
        UsuarioPressaoArterialRegistro::create($dados);
        return redirect('UsuarioPressaoArterialRegistros');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = UsuarioPressaoArterialRegistro::where("id_usuario",Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('usuarioPressaoArterialRegistro.index', [
            'registrosPressaoArterial' => $registros
        ]);
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarioPressaoArterialRegistro.create');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = UsuarioPressaoArterialRegistro::find($id);
        $registro->delete();
        return redirect('/UsuarioPressaoArterialRegistros');
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
        $registro = UsuarioPressaoArterialRegistro::find($id);
        $dados = request()->validate([
            'pressao_arterial_sistolica' => 'required',
            'pressao_arterial_diastolica' => 'required',
            'created_at' => 'required'
        ]);
        $registro->update($dados);
        return redirect('/UsuarioPressaoArterialRegistros');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = UsuarioPressaoArterialRegistro::find($id);
        return view('usuarioPressaoArterialRegistro.edit', compact('registro'));
    }
}
