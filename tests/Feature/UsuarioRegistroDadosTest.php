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
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        $this->post('/users', $this->dadosUsuario());
        
        $response = $this->post('/UsuarioGlicoseRegistros', [
            'id_usuario' => 1,
            'glicose' => 20,
        ]);
        
        $response->assertRedirect('/UsuarioGlicoseRegistros');
        $this->assertCount(1, UsuarioGlicoseRegistro::all());
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_glicose_tem_que_ter_glicemia_e_usuario()
    {
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        
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
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        $this->post('/users', $this->dadosUsuario());
        
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
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        
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
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        $this->post('/users', $this->dadosUsuario());
        $user = User::first();
        $this->be($user);
        
        $response = $this->post('/UsuarioPesoRegistros', [
            'id_usuario' => $user->id,
            'peso' => 19,
            'unidade' => 'KG',
        ]);
        
        $response->assertRedirect("/UsuarioPesoRegistros");
        $this->assertCount(1, UsuarioPesoRegistro::all());
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_peso_tem_que_ter_peso_e_usuario_e_unidade()
    {
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        
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
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        $this->post('/users', $this->dadosUsuario());
        $user = User::first();
        $this->be($user);
        
        $response = $this->post('/UsuarioBatimentosCardiacosRegistros', [
            'id_usuario' => $user->id,
            'batimentos_cardiacos' => 19,
        ]);
        
        $response->assertRedirect("/UsuarioBatimentosCardiacosRegistros");
        $this->assertCount(1, UsuarioBatimentosCardiacosRegistro::all());
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_batimentos_cardiacos_tem_que_ter_peso_e_usuario_e_unidade()
    {
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        
        $response = $this->post('/UsuarioBatimentosCardiacosRegistros', [
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
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        $this->post('/users', $this->dadosUsuario());
        $user = User::first();
        $this->be($user);
        
        $response = $this->post('/UsuarioPressaoArterialRegistros', [
            'id_usuario' => $user->id,
            'pressao_arterial_sistolica' => 19,
            'pressao_arterial_diastolica' => 10
        ]);
        
        $response->assertRedirect("/UsuarioPressaoArterialRegistros");
        $this->assertCount(1, UsuarioPressaoArterialRegistro::all());
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function um_registro_pressao_arterial_tem_que_ter_peso_e_usuario_e_unidade()
    {
        $user = new User([
            'id' => 1,
            'name' => "Teste login",
        ]);
        $this->be($user);
        
        $response = $this->post('/UsuarioPressaoArterialRegistros', [
            'id_usuario' => 1,
            'pressao_arterial_sistolica' => 19,
            'pressao_arterial_diastolica' => 10
        ]);
        $response->assertSessionHasErrors();
    }

    /**
     * @return array
     */
    private function dadosUsuario() {
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
