<?php

namespace App\Http\Controllers;

use App\Models\PuntosInteres;
use App\Models\ServiciosEsenciales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class PuntosInteresController extends Controller
{
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'Nombre'       => 'required',
            'Departamento' => 'required',
            'Ciudad'       => 'required',
            'Direccion'    => 'required',
        ], [
            'Nombre.required'       => 'El nombre es obligatorio',
            'Departamento.required' => 'El Departamento es obligatorio',
            'Ciudad.required'       => 'La Ciudad es obligatorio',
            'Direccion.required'    => 'La direccion es obligatorio',
        ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $puntosInteres               = new PuntosInteres();
        $puntosInteres->Nombre       = $request->Nombre;
        $puntosInteres->Departamento = $request->Departamento;
        $puntosInteres->Ciudad       = $request->Ciudad;
        $puntosInteres->Direccion    = $request->Direccion;
        $puntosInteres->Contacto     = $request->Contacto;
        $puntosInteres->Horario      = $request->Horario;
        $puntosInteres->Descripcion  = $request->Descripcion;
        $puntosInteres->Imagen       = $request->Imagen;
        $puntosInteres->save();
        $p  = json_decode($request->InformacionDetalladaPuntoDeInteres);
        $id = PuntosInteres::latest('id')->first();
        if ($p->Op === 'ServicioEsencial') {
            return $this->AltaDeServicio($id->id, $p->Tipo);
        }
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);

    }
    public function AltaDeServicio($IdPuntoDeInteres, $tipoDeServicio)
    {
        $servicio                   = new ServiciosEsenciales();
        $servicio->puntosinteres_id = $IdPuntoDeInteres;
        $servicio->Tipo             = $tipoDeServicio;
        $servicio->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
    }

    public function ListarPuntosDeInteres(Request $request, $Categoria)
    {
        if($Categoria==='PuntosDeInteres'){
            $PuntosDeInteres=PuntosInteres::all();
            return response() ->json($PuntosDeInteres);
        }
        $puntos = DB::table('puntosinteres')
        ->join('servicios_esenciales','puntosinteres.id','=','servicios_esenciales.puntosinteres_id')
        ->paginate(10);
        // $puntos = DB::table('puntosinteres') -> where('nombre', 'like', '%' . $Nombre . '%')->paginate(10);
        // return response() ->json($puntos);

    }

    private function buscarServicioEscencial($Tipo){
            $categoria = 'servicios_esenciales';
            $puntosInteres = DB::table('puntosinteres')
                ->Join($categoria, 'puntosinteres.id', '=', 'puntosinteres_id')
                ->where($categoria . '.tipo', '=', $Tipo)
                ->paginate(10);

            return response()->json($puntosInteres);

    }

    public function update(Request $request, $IdPuntoDeInteres)
    {
        $p               = PuntosInteres::find($IdPuntoDeInteres);
        $p->Nombre       = $request->Nombre;
        $p->Departamento = $request->Departamento;
        $p->Ciudad       = $request->Ciudad;
        $p->Direccion    = $request->Direccion;
        $p->Contacto     = $request->Contacto;
        $p->Horario      = $request->Horario;
        $p->Descripcion  = $request->Descripcion;
        $p->save();

        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se modifico con exito",
        ]);
    }

    public function destroy(Request $request, $IdPuntoDeInteres)
    {
        $p = PuntosInteres::find($IdPuntoDeInteres);
        $p->delete();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se elimino con exito",
        ]);
    }
}
