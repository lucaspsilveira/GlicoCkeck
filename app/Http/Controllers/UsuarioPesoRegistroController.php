<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioPesoRegistro;
use Illuminate\Support\Facades\Auth;

class UsuarioPesoRegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request) {
        $request['id_usuario'] = Auth::user()->id;
        $dados = request()->validate([
            'id_usuario' => 'exists:users,id',
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
        $registros = UsuarioPesoRegistro::all()->whereIn("id_usuario",Auth::user()->id);
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
}
