<?php

namespace App\Http\Controllers;

use App\Models\PuntosInteres;
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
        //$puntosInteres->request()->all;
        $puntosInteres->save();
        // return response()->json([
        //     'message'     => 'Successfully registered User profile',
        //     'userprofile' => $puntosInteres->PuntosInteres(),
        // ]);
        // return $puntosInteres;
        
        //PuntosInteres::insert($puntosInteres);
        //return $puntosInteres;
        return response()->json([
            "codigo"=>"200",
            "respuesta"=>"Se ingreso con exito"
           ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PuntosInteres  $puntosInteres
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$p= modelo::findOrFail($id);
        $puntosInteres['puntointeres']=PuntosInteres::all();
        return response()->json($puntosInteres);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PuntosInteres  $puntosInteres
     * @return \Illuminate\Http\Response
     */
    public function edit(PuntosInteres $puntosInteres)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PuntosInteres  $puntosInteres
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PuntosInteres  $puntosInteres
     * @return \Illuminate\Http\Response
     */
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
