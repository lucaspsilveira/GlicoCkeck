<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioBatimentosCardiacosRegistro;
use Illuminate\Support\Facades\Auth;

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
        return redirect('UsuarioBatimentosCardiacosRegistros');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = UsuarioBatimentosCardiacosRegistro::all()->whereIn("id_usuario",Auth::user()->id);
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
}
