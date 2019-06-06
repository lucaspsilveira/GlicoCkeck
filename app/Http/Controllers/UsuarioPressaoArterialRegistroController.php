<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioPressaoArterialRegistro;

class UsuarioPressaoArterialRegistroController extends Controller
{
    public function store() {
        $dados = request()->validate([
            'id_usuario' => 'exists:users,id',
            'pressao_arterial_sistolica' => 'required',
            'pressao_arterial_diastolica' => 'required',
        ]);
        UsuarioPressaoArterialRegistro::create($dados);
    }
}
