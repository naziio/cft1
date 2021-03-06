<?php

namespace App\Http\Controllers;

use App\DetalleFactura;
use App\Factura;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;

class DetalleFacturaController extends Controller
{
    public function index(Request $request)
    {

       // $factura = Factura::find($request->id);
        $factura = $request->id;
        $detalle = DetalleFactura::select('id_producto','cantidad','precio_unitario','total')
            ->where('factura_fk',$factura)
            ->get();

        return view('obra.factura.detalle.index', compact('factura','detalle'));
    }


    public function create($factura)
    {

        return view('obra.factura.detalle.create', compact('factura'));
    }

    public function store(Request $request)
    {

        $detalle= new DetalleFactura($request->all());
        $detalle->save();
        return view('obra.factura.detalle.create');

    }
    public function edit($detalle)
    {
        $detalle = DetalleFactura::find($detalle);
        return Response::json($detalle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($detalle)
    {

        $detalle =DetalleFactura::findOrfail($detalle);
        $detalle->save();
        return Response::json($detalle);
    }

    public function show($detalle)
    {
        $detalle = Factura::find($detalle);
        return Response::json($detalle);
    }



    public function cargar_datos2(Request $request)
    {
        $factura=$request->factura;
        //dd($presupuesto);
        $archivo = $request->file('archivo');
        $nombre_original=$archivo->getClientOriginalName();
        $extension=$archivo->getClientOriginalExtension();
        $r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
        $ruta  =  storage_path("app/public/$nombre_original");

        if($r1){

            Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) use($factura) {


                $hoja->each(function($fila) use($factura) {

                    $detalle=new detalle();
                    $detalle->detalle=$fila->detalle;
                    $detalle->unidad= $fila->unidad;
                    $detalle->factura_fk=$factura;
                    $detalle->save();


                });

            });

            return redirect("obra/factura/detalle")->with("msj"," detalles Cargados Correctamente");

        }
    }
}

