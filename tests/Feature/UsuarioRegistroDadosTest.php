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
        $this->withoutExceptionHandling();
        $response = $this->post('/UsuarioAlturaRegistros', [
            'id_usuario' => 1,
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
