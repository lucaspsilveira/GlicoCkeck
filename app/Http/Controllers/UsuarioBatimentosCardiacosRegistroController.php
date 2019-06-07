<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioBatimentosCardiacosRegistro;

class UsuarioBatimentosCardiacosRegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store() {
        $dados = request()->validate([
            'id_usuario' => 'exists:users,id',
            'batimentos_cardiacos' => 'required',
        ]);
        UsuarioBatimentosCardiacosRegistro::create($dados);
    }
}
