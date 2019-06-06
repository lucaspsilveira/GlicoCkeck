<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\UsuarioGlicoseRegistro;
use App\UsuarioAlturaRegistro;

class UsuarioRegistroDadosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_glicose_pode_ser_adicionado()
    {
        $this->post('/users', [
            'name' => 'Lucas',
            'password' => 'dsdsdsd',
            'data_nascimento' => "1998-12-12",
            'usuario' => 'luquinhaas',
            'email' => 'lucasss@lucas.com',
        ]);
        $this->withoutExceptionHandling();
        $response = $this->post('/UsuarioGlicoseRegistros', [
            'id_usuario' => 1,
            'glicose' => 20,
        ]);
        $response->assertOk();
        $this->assertCount(1, UsuarioGlicoseRegistro::all());
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_glicose_tem_que_ter_glicemia_e_usuario()
    {
        //$this->withoutExceptionHandling();
        $response = $this->post('/UsuarioGlicoseRegistros', [
            'id_usuario' => '1',
            'glicose' => '1',
        ]);
        $response->assertSessionHasErrors();
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_altura_pode_ser_adicionado()
    {
        $oi = $this->post('/users', [
            'name' => 'Lucas sdfsd',
            'password' => 'dsdsdsd',
            'data_nascimento' => "1998-12-12",
            'usuario' => 'luquinhaassdfds',
            'email' => 'lucasdfdfss@lucas.com',
        ]);
        $this->withoutExceptionHandling();
        $response = $this->post('/UsuarioAlturaRegistros', [
            'id_usuario' => 2,
            'altura' => 1.8,
            'unidade' => 'metros',
        ]);
        $response->assertOk();
        $this->assertCount(1, UsuarioAlturaRegistro::all());
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_altura_tem_que_ter_altura_e_usuario_e_unidade()
    {
        //$this->withoutExceptionHandling();
        $response = $this->post('/UsuarioAlturaRegistros', [
            'id_usuario' => '1',
            'altura' => '1',
            'unidate' => 'metros',
        ]);
        $response->assertSessionHasErrors();
    }
}
