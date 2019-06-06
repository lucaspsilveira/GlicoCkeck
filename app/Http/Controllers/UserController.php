<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function store() {
        $dados = request()->validate([
            'email' => 'required|unique:users,email',
            'name' => 'required',
            'data_nascimento' => 'required',
            'usuario' => 'required|unique:users,usuario',
            'password' => 'required',
        ]);
        User::create($dados);
    }
}
