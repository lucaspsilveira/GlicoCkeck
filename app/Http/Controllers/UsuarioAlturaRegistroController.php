<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioAlturaRegistro;

class UsuarioAlturaRegistroController extends Controller
{
    public function store() {
        $dados = request()->validate([
            'id_usuario' => 'exists:users,id',
            'altura' => 'required',
            'unidade' => 'required',
        ]);
        UsuarioAlturaRegistro::create($dados);
    }
}
