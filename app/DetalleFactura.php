<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $table='detalle_factura';

    protected $fillable= ['id_producto', 'cantidad', 'precio_unitario', 'total', 'factura_fk'];


}
