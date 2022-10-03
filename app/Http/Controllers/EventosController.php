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
        $evento=new Eventos();
        $evento->puntosinteres_id=$request->LugarDelEvento;
        $evento->Nombre=$request->Nombre;
        $evento->LugarDeVentaDeEntradas=$request->LugarDeVentaDeEntradas;
        $evento->FechaInicio=$request->FechaInicio;
        $evento->FechaFin=$request->FechaFin;
        $evento->HoraInicio=$request->HoraInicio;
        $evento->HoraFin=$request->HoraFin;
        $evento->Tipo=$request->TipoDeEvento;
        $evento->save();
        return response() ->json(['codigo'=>'200',"respuesta"=>'Se registro el evento correctamente']);
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

    
    public function destroy($id)
    {
        $evento=Eventos::findOrFail($id);
        $evento->delete();
         return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se elimino con exito",
        ]);
    }
}
