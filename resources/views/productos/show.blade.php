@extends('layout')
@section('header')
<div class="page-header">
        <h1>Productos / Show #{{$producto->id}}</h1>
        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('productos.edit', $producto->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="producto_codigo_interno">PRODUCTO_CODIGO_INTERNO</label>
                     <p class="form-control-static">{{$producto->producto_codigo_interno}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_codigo_proveedor">PRODUCTO_CODIGO_PROVEEDOR</label>
                     <p class="form-control-static">{{$producto->producto_codigo_proveedor}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_codigo_barras">PRODUCTO_CODIGO_BARRAS</label>
                     <p class="form-control-static">{{$producto->producto_codigo_barras}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_imagen">PRODUCTO_IMAGEN</label>
                     <p class="form-control-static">{{$producto->producto_imagen}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_descripcion">PRODUCTO_DESCRIPCION</label>
                     <p class="form-control-static">{{$producto->producto_descripcion}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_unidad_x_bulto">PRODUCTO_UNIDAD_X_BULTO</label>
                     <p class="form-control-static">{{$producto->producto_unidad_x_bulto}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_precio_venta">PRODUCTO_PRECIO_VENTA</label>
                     <p class="form-control-static">{{$producto->producto_precio_venta}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_precio_costo">PRODUCTO_PRECIO_COSTO</label>
                     <p class="form-control-static">{{$producto->producto_precio_costo}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_marca_id">FK_MARCA_ID</label>
                     <p class="form-control-static">{{$producto->fk_marca_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_proveedor_cliente_id">FK_PROVEEDOR_CLIENTE_ID</label>
                     <p class="form-control-static">{{$producto->fk_proveedor_cliente_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_rubro_id">FK_RUBRO_ID</label>
                     <p class="form-control-static">{{$producto->fk_rubro_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_talla_id">FK_TALLA_ID</label>
                     <p class="form-control-static">{{$producto->fk_talla_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_color_id">FK_COLOR_ID</label>
                     <p class="form-control-static">{{$producto->fk_color_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('productos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection