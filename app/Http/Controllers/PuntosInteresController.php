<?php

namespace App\Http\Controllers;

use App\Models\PuntosInteres;
use App\Models\ServiciosEsenciales;
use Illuminate\Http\Request;

class PuntosInteresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $puntosInteres = new PuntosInteres();
        $puntosInteres -> Nombre = $request->Nombre;
        $puntosInteres -> Departamento = $request->Departamento;
        $puntosInteres -> Ciudad = $request->Ciudad;
        $puntosInteres -> Direccion = $request->Direccion;
        $puntosInteres -> Contacto = $request->Contacto;
        $puntosInteres -> Horario = $request->Horario;
        $puntosInteres -> Descripcion = $request->Descripcion;
        $puntosInteres -> Imagen = $request->Imagen;
        // if($request->hasFile('Imagen')){
        //     $puntosInteres['Imagen']=$request->file('Imagen')->store('uploads','public');
        // }
        $puntosInteres->save();
        // $ultimopunto= PuntosInteres::latest('id')->first();

        // $servicio = new ServiciosEscenciales();
        // $servicio -> puntosinteres_id = $ultimopunto->id;
        // $servicio -> Tipo = $request->Tipo;
        // $servicio->save();
        //return $puntosInteres;
        return response()->json([
            "codigo"=>"200",
            "respuesta"=>"Se ingreso con exito"
           ]);
    }
    public function AltaDeServicio(Request $request)
    {
        $servicio = new ServiciosEsenciales();
        $u=PuntosInteres::latest('id')->first();

        $servicio->puntosinteres_id=$u->id;
        $servicio->Tipo=$request->Tipo;
        $servicio->save();
        return response()->json([
            "codigo"=>"200",
            "respuesta"=>"Se ingreso con exito"
           ]);
    }
   
    public function show()
    {
        //$p= modelo::findOrFail($id);
        $puntosInteres['puntointeres']=PuntosInteres::all();
        return response()->json($puntosInteres);
    }

 
    public function edit(PuntosInteres $puntosInteres)
    {
        //
    }

  
    public function update(Request $request, $IdPuntoDeInteres)
    {
        $p = PuntosInteres::find($IdPuntoDeInteres);
        $p -> Nombre = $request->Nombre;
        $p -> Departamento = $request->Departamento;
        $p -> Ciudad = $request->Ciudad;
        $p -> Direccion = $request->Direccion;
        $p -> Contacto = $request->Contacto;
        $p -> Horario = $request->Horario;
        $p -> Descripcion = $request->Descripcion;
        $p -> save();
        
        return response()->json([
            "codigo"=>"200",
            "respuesta"=>"Se modifico con exito"
           ]);
    }

    public function destroy(Request $request, $IdPuntoDeInteres)
    {
        $p = PuntosInteres::find($IdPuntoDeInteres);
        $p -> delete();
       return response()->json([
        "codigo"=>"200",
        "respuesta"=>"Se elimino con exito"
       ]);
    }
}
