<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\UsuarioGlicoseRegistro;
use App\UsuarioAlturaRegistro;
use App\UsuarioPesoRegistro;
use App\UsuarioBatimentosCardiacosRegistro;
use App\User;
use App\UsuarioPressaoArterialRegistro;

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
            'sexo' => 0,
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
            'sexo' => 0,
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

    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_peso_pode_ser_adicionado()
    {
        $oi = $this->post('/users', [
            'name' => 'Lucas sdfsd',
            'password' => 'dsdsdsd',
            'sexo' => 0,
            'data_nascimento' => "1998-12-12",
            'usuario' => 'luquinhaassdfds',
            'email' => 'lucasdfdfss@lucas.com',
        ]);
        $this->withoutExceptionHandling();
        $response = $this->post('/UsuarioPesoRegistros', [
            'id_usuario' => 3,
            'peso' => 19,
            'unidade' => 'KG',
        ]);
        $response->assertOk();
        $this->assertCount(1, UsuarioPesoRegistro::all());
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_peso_tem_que_ter_peso_e_usuario_e_unidade()
    {
        //$this->withoutExceptionHandling();
        $response = $this->post('/UsuarioPesoRegistros', [
            'id_usuario' => '1',
            'peso' => '1',
            'unidade' => 'peso',
        ]);
        $response->assertSessionHasErrors();
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_batimentos_cardiacos_pode_ser_adicionado()
    {
        $oi = $this->post('/users', [
            'name' => 'Lucas sdfsd',
            'password' => 'dsdsdsd',
            'sexo' => 0,
            'data_nascimento' => "1998-12-12",
            'usuario' => 'luquinhaassdfds',
            'email' => 'lucasdfdfss@lucas.com',
        ]);
        $this->withoutExceptionHandling();
        $response = $this->post('/UsuarioBatimentosRegistros', [
            'id_usuario' => 4,
            'batimentos_cardiacos' => 19,
        ]);
        $response->assertOk();
        $this->assertCount(1, UsuarioBatimentosCardiacosRegistro::all());
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_batimentos_cardiacos_tem_que_ter_peso_e_usuario_e_unidade()
    {
        //$this->withoutExceptionHandling();
        $response = $this->post('/UsuarioBatimentosRegistros', [
            'id_usuario' => '1',
            'batimentos_cardiacos' => 3,
        ]);
        $response->assertSessionHasErrors();
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_pressao_arterial_pode_ser_adicionado()
    {
        $oi = $this->post('/users', [
            'name' => 'Lucas sdfsd',
            'password' => 'dsdsdsd',
            'sexo' => 0,
            'data_nascimento' => "1998-12-12",
            'usuario' => 'luquinhaassdfds',
            'email' => 'lucasdfdfss@lucas.com',
        ]);
        $this->withoutExceptionHandling();
        $response = $this->post('/UsuarioPressaoArterialRegistros', [
            'id_usuario' => 5,
            'pressao_arterial_sistolica' => 19,
            'pressao_arterial_diastolica' => 10
        ]);
        $response->assertOk();
        $this->assertCount(1, UsuarioPressaoArterialRegistro::all());
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_pressao_arterial_tem_que_ter_peso_e_usuario_e_unidade()
    {
        //$this->withoutExceptionHandling();
        $response = $this->post('/UsuarioPressaoArterialRegistros', [
            'id_usuario' => 1,
            'pressao_arterial_sistolica' => 19,
            'pressao_arterial_diastolica' => 10
        ]);
        $response->assertSessionHasErrors();
    }
}
