<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PuntosInteres;
use App\Models\ServiciosEsenciales;
use App\Models\Telefonos;
use App\Models\Espectaculos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
class EventosController extends Controller
{
   
    public function index()
    {
        //
    }

 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    
    public function show(Eventos $eventos)
    {
        $eventos=Eventos::paginate(10);
        return response() ->json($eventos);
    }

  
    public function edit(Eventos $eventos)
    {
        //
    }

    public function update(Request $request, Eventos $eventos)
    {
        //
    }

    
    public function destroy(Eventos $eventos)
    {
        //
    }
}
