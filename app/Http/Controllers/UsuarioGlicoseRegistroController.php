<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioGlicoseRegistro;

class UsuarioGlicoseRegistroController extends Controller
{
    public function store() {
        UsuarioGlicoseRegistro::create([
            'id_usuario' => request('id_usuario'),
            'glicose' => request('glicose'),
        ]);
    }
}
