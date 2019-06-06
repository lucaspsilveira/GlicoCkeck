<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UsuarioCriacaoTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @test 
     */
    public function um_usuario_pode_se_cadastrar()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/users', [
            'name' => 'Lucas',
            'password' => 'dsdsdsd',
            'sexo' => 0,
            'data_nascimento' => "1998-12-12",
            'usuario' => 'luquinhaas',
            'email' => 'lucasss@lucas.com',
        ]);
        $response->assertOk();
        $this->assertCount(1, User::all());
    }
    /**
     * A basic test example.
     *
     * @test 
     */
    public function um_usuario_nao_pode_se_cadastrar_com_algum_campo_nulo_ou_repetido()
    {
        //$this->withoutExceptionHandling();
        $response = $this->post('/users', [
            'name' => '',
            'password' => 'dsdsdsd',
            'sexo' => 0,
            'data_nascimento' => "1998-12-12",
            'usuario' => 'luquinhas',
            'email' => 'lucas@lucas.com',
        ]);
        $response->assertSessionHasErrors();
    }
}
