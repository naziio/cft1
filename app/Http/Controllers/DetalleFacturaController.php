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

        return view('obra.factura.detalle.show', compact('factura','detalle'));
    }


    public function create(Request $request)
    {
        $detalle=DetalleFactura::create($request->all());
        return Response::json($detalle);
    }

    public function store(Request $request)
    {

        $detalle= new DetalleFactura($request->all());
        $detalle->save();
        return view('obra.factura.detalle.show');

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

}

