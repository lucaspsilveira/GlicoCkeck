<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioPressaoArterialRegistro;
use Illuminate\Support\Facades\Auth;

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
        $registros = UsuarioPressaoArterialRegistro::all()->whereIn("id_usuario",Auth::user()->id);
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
}
