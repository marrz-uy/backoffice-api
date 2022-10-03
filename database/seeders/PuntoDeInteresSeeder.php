<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PuntoDeInteresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($c = 0; $c < 40; $c++)
            DB::table('puntosinteres')->insert([
                'Nombre' => 'PuntodeInteres'.$c,
                
            ]);
    }
}
