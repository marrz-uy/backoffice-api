<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class EventosSeeder extends Seeder
{

    public function run()
    {
        DB::table('eventos')->insert([
            'Nombre' => 'Evento1',
            'puntosinteres_id' => '1',
            'LugarDeVentaDeEntradas' => 'RedPagos',
            'FechaInicio' =>'2022-09-29' ,
            'FechaFin' => '2022-09-29',
            'HoraInicio' => '10:30:00',
            'HoraFin' => '23:30:00',
            'Tipo' => 'Concierto',
        ]);

        DB::table('eventos')->insert([
            'Nombre' => 'Evento2',
            'puntosinteres_id' => '1',
            'LugarDeVentaDeEntradas' => 'RedPagos',
            'FechaInicio' =>'2022-09-29' ,
            'FechaFin' => '2022-09-29',
            'HoraInicio' => '10:30:00',
            'HoraFin' => '23:30:00',
            'Tipo' => 'Concierto',
        ]);
    }
}