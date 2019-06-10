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
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        //$this->withoutExceptionHandling();
        $response = $this->post('/users', $this->dadosUsuario());
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
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        //$this->withoutExceptionHandling();
        $response = $this->post('/users', array_merge($this->dadosUsuario(), ['name' => '']));
        $response->assertSessionHasErrors();
    }

    /**
     * @return array
     */
    private function dadosUsuario(){
        return [
            'name' => 'Lucas',
            'password' => 'dsdsdsd',
            'sexo' => 0,
            'data_nascimento' => "1998-12-12",
            'usuario' => 'luquinhaas',
            'email' => 'lucasss@lucas.com',
        ];
    }
}
