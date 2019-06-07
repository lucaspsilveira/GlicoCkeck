<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioPesoRegistro;

class UsuarioPesoRegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store() {
        $dados = request()->validate([
            'id_usuario' => 'exists:users,id',
            'peso' => 'required',
            'unidade' => 'required',
        ]);
        UsuarioPesoRegistro::create($dados);
    }
}
