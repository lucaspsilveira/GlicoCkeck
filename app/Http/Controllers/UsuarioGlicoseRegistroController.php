<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioGlicoseRegistro;

class UsuarioGlicoseRegistroController extends Controller
{
    public function store() {
        $dados = request()->validate([
            'id_usuario' => 'exists:users,id',
            'glicose' => 'required'
        ]);
        UsuarioGlicoseRegistro::create($dados);
    }
}
