<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class ArtistasSeeder extends Seeder
{

    public function run()
    {
        DB::table('artistas')->insert([
            'NombreArtistico' => 'Duki',
            'eventos_id' => '1',
            'Genero' => 'Trapero',
            'Descripcion' =>'eeeee' ,
            
        ]);

        DB::table('artistas')->insert([
            'NombreArtistico' => 'Messi',
            'eventos_id' => '1',
            'Genero' => 'Fubolero',
            'Descripcion' =>'rrrrrr' ,
            
        ]);
    }
}