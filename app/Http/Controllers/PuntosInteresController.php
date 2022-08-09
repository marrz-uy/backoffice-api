<?php

namespace App\Http\Controllers;

use App\Models\PuntosInteres;
use App\Models\ServiciosEsenciales;
use Illuminate\Http\Request;
use Validator;
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
        $validator = Validator::make($request->all(), [
            'Nombre'    => 'required',
            'Departamento' => 'required',
            'Ciudad' => 'required',
            'Direccion' => 'required'
        ], [
            'Nombre.required'    => 'El nombre es obligatorio',
            'Departamento.required'    => 'El Departamento es obligatorio',
            'Ciudad.required'    => 'La Ciudad es obligatorio',
            'Direccion.required'    => 'La direccion es obligatorio'
        ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $puntosInteres = new PuntosInteres();
        $puntosInteres -> Nombre = $request->Nombre;
        $puntosInteres -> Departamento = $request->Departamento;
        $puntosInteres -> Ciudad = $request->Ciudad;
        $puntosInteres -> Direccion = $request->Direccion;
        $puntosInteres -> Contacto = $request->Contacto;
        $puntosInteres -> Horario = $request->Horario;
        $puntosInteres -> Descripcion = $request->Descripcion;
        $puntosInteres -> Imagen = $request->Imagen;
        $puntosInteres->save();
        $p= json_decode($request -> InformacionDetalladaPuntoDeInteres);
        $id= PuntosInteres::latest('id')->first();
        if($p->Op==='ServicioEsencial'){
          return  $this->AltaDeServicio($id->id,$p->Tipo);
        }
        
        // if($request->hasFile('Imagen')){
        //      $request->file('Imagen')->store('uploads','public');
        //  }
        return response()->json([
            "codigo"=>"200",
            "respuesta"=>"Se ingreso con exito"
           ]);

    }
    public function AltaDeServicio($IdPuntoDeInteres, $tipoDeServicio)
    {
        $servicio = new ServiciosEsenciales();
        $servicio->puntosinteres_id=$IdPuntoDeInteres;
        $servicio->Tipo=$tipoDeServicio;
        $servicio->save();
        return response()->json([
            "codigo"=>"200",
            "respuesta"=>"Se ingreso con exito"
           ]);
                // return response()->json([
                //         "ID"=>$IdPuntoDeInteres,
                //         "Tipo"=>$tipoDeServicio
                //     ]);
                    //return $servicio;
    }
   
    public function show(Request $request, $categoria)
    {
        //$p= modelo::findOrFail($id);
        //$Servicio = DB::table('puntosinteres')->Join($categoria)->get();
        //$Servicio = DB::table('puntosinteres')->join('servicios_esenciales','puntosinteres.id','=','puntosinteres_id')->get();
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
