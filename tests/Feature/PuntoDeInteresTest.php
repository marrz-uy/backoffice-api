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

    public function test_Pagination_Punto_De_Interes()
    {
        $response = $this->get('/api/PuntosInteres/PuntosDeInteres');
        $response->assertJsonCount(10,"data");
        $response->assertJsonStructure(["next_page_url"]);
        $response->assertJsonStructure(["last_page_url"]);
        $response->assertJsonStructure(["current_page"]);

    }
    public function test_Pagination_Servicio_Esencial()
    {
        $response = $this->get('/api/PuntosInteres/servicios_esenciales');
        $response->assertJsonCount(10,"data");
        $response->assertJsonStructure(["next_page_url"]);
        $response->assertJsonStructure(["last_page_url"]);
        $response->assertJsonStructure(["current_page"]);

    }
    
    public function test_Alta_De_Servicio_Esencial(){
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->postJson('/api/PuntosInteres', [
            'Nombre'                => 'FarmaciaTEST',
            'Departamento'             => 'Montevideo',
            'Ciudad' => 'Montevideo',
            'Direccion' => '18 de Julio 3014',
            'Contacto'=>'29025010',
            'Horario'=>null,
            'Descripcion'=>'Farmaciadeltest',
            'Imagen'=>null,
            "InformacionDetalladaPuntoDeInteres"=>"{\"Tipo\":\"Seccionales\",\"Op\":\"ServicioEsencial\"}"
        ]);
            $response->assertStatus(200);
    }
    
    public function test_Baja_De_Punto_De_Interes(){
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->delete('/api/PuntosInteres/47/PuntosDeInteres', []);
        
       $response->assertStatus(200);
    }
    public function test_Baja_De_Servicio_Esencial(){
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->delete('/api/PuntosInteres/21/servicios_esenciales',[]);
        
       $response->assertStatus(200);
    }
}
