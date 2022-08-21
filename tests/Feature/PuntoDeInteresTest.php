<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PuntoDeInteresTest extends TestCase
{

    public function test_getAll()
    {
        $response = $this->get('/api/PuntosInteres/PuntosDeInteres');
        $response->assertStatus(200);
    }

    public function test_Pagination()
    {
        $response = $this->get('/api/PuntosInteres/PuntosDeInteres');
        $response->assertJsonCount(10,"data");
        $response->assertJsonStructure(["next_page_url"]);
        $response->assertJsonStructure(["last_page_url"]);
        $response->assertJsonStructure(["current_page"]);


    }
    public function test_Alta_De_Servicio(){
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->postJson('/api/PuntosInteres', [
            'email'                => 'martin2@gmail.com',
            'password'             => '12345678',
            'passwordConfirmation' => '12345678',
        ]);
        $response=$this->get('/')->assertStatus(200);
    }
    
}
