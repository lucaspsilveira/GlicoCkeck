<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\UsuarioGlicoseRegistro;

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
}
