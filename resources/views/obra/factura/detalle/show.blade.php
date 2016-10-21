@extends('layouts.app')

@section('htmlheader_title')
detalle
@endsection


@section('main-content')

<div class="container">
    <div class="container-narrow">
        <h2>Detalle de factura</h2>
        <div>

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>cantidad</th>
                    <th>Precio unitario</th>
                    <th>Total</th>
 

                </tr>
                </thead>
                <tbody >
                @foreach ($detalle as $detalles)
                <tr id="detalle{{$detalles->id}}">
                    <td>{{$detalles->id}}</td>
                    <td>{{$detalles->id_producto}}</td>
                    <td>{{$detalles->cantidad}}</td>
                    <td>{{$detalles->precio_unitario}}</td>
                    <td>{{$detalles->total}}</td>
                    <td>{{$detalles->created_at}}</td>
                    <td>
                        <a href="#"><button  class="btn btn-warning btn-xs btn-detail" value="{{$detalles->id}}">Editar</button></a>
                        <a href="#"><button class="btn btn-danger btn-xs btn-delete " value="{{$detalles->id}}">Eliminar</button></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Agregar Factura</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmfactura" name="frmfactura" class="form-horizontal" novalidate="">
                                <div class="form-group">
                                    <label for="razon_social" class="col-sm-3 control-label">Razon social</label>
                                    <div class="col-sm-9">
                                        {!! Form::select('razon_social', $proveedor, $selected,['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subtotal" class="col-sm-3 control-label">SUB TOTAL</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="subtotal" name="subtotal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="recargo" class="col-sm-3 control-label">Recargo</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="recargo" name="recargo">
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="num_factura" class="col-sm-3 control-label">N° Factura</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="num_factura" name="num_factura" placeholder="12345" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="monto_exento" class="col-sm-3 control-label">Exento</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="monto_exento" name="monto_exento">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descuentos" class="col-sm-3 control-label">Descuento</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="descuentos" name="descuentos">
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="impuesto_especifico" class="col-sm-3 control-label">Imp. especifico</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="impuesto_especifico" name="impuesto_especifico" placeholder="" value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="neto" class="col-sm-3 control-label">Neto</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="neto" name="neto" placeholder="" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="iva" class="col-sm-3 control-label">IVA</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="iva" name="iva" placeholder="" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="total_concepto" class="col-sm-3 control-label">Concepto</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="total_concepto" name="total_concepto" placeholder="" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="observacion" class="col-sm-3 control-label">Observacion</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="observacion" name="observacion" placeholder="" value="">
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Guardar cambios</button>
                            <input type="hidden" id="factura_id" name="factura_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/factura.js')}}"></script>
    </body>


</div>
@endsection