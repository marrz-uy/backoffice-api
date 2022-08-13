<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PuntoDeInteresTest extends TestCase
{

    public function test_getAll()
    {
        $response = $this->get('/api/PuntosInteres');
        $response->assertStatus(200);
    }

    public function test_Pagination()
    {
        $response = $this->get('/api/PuntosInteres');
        $response->assertJsonCount(10,"data");
        $response->assertJsonStructure(["next_page_url"]);
        $response->assertJsonStructure(["last_page_url"]);
        $response->assertJsonStructure(["current_page"]);


    }

    
}
