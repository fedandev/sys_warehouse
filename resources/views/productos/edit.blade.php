@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Productos / Edit #{{$producto->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('producto_codigo_interno')) has-error @endif">
                       <label for="producto_codigo_interno-field">Producto_codigo_interno</label>
                    <input type="text" id="producto_codigo_interno-field" name="producto_codigo_interno" class="form-control" value="{{ is_null(old("producto_codigo_interno")) ? $producto->producto_codigo_interno : old("producto_codigo_interno") }}"/>
                       @if($errors->has("producto_codigo_interno"))
                        <span class="help-block">{{ $errors->first("producto_codigo_interno") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_codigo_proveedor')) has-error @endif">
                       <label for="producto_codigo_proveedor-field">Producto_codigo_proveedor</label>
                    <input type="text" id="producto_codigo_proveedor-field" name="producto_codigo_proveedor" class="form-control" value="{{ is_null(old("producto_codigo_proveedor")) ? $producto->producto_codigo_proveedor : old("producto_codigo_proveedor") }}"/>
                       @if($errors->has("producto_codigo_proveedor"))
                        <span class="help-block">{{ $errors->first("producto_codigo_proveedor") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_codigo_barras')) has-error @endif">
                       <label for="producto_codigo_barras-field">Producto_codigo_barras</label>
                    <input type="text" id="producto_codigo_barras-field" name="producto_codigo_barras" class="form-control" value="{{ is_null(old("producto_codigo_barras")) ? $producto->producto_codigo_barras : old("producto_codigo_barras") }}"/>
                       @if($errors->has("producto_codigo_barras"))
                        <span class="help-block">{{ $errors->first("producto_codigo_barras") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_imagen')) has-error @endif">
                       <label for="producto_imagen-field">Producto_imagen</label>
                    <input type="text" id="producto_imagen-field" name="producto_imagen" class="form-control" value="{{ is_null(old("producto_imagen")) ? $producto->producto_imagen : old("producto_imagen") }}"/>
                       @if($errors->has("producto_imagen"))
                        <span class="help-block">{{ $errors->first("producto_imagen") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_descripcion')) has-error @endif">
                       <label for="producto_descripcion-field">Producto_descripcion</label>
                    <input type="text" id="producto_descripcion-field" name="producto_descripcion" class="form-control" value="{{ is_null(old("producto_descripcion")) ? $producto->producto_descripcion : old("producto_descripcion") }}"/>
                       @if($errors->has("producto_descripcion"))
                        <span class="help-block">{{ $errors->first("producto_descripcion") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_unidad_x_bulto')) has-error @endif">
                       <label for="producto_unidad_x_bulto-field">Producto_unidad_x_bulto</label>
                    <input type="text" id="producto_unidad_x_bulto-field" name="producto_unidad_x_bulto" class="form-control" value="{{ is_null(old("producto_unidad_x_bulto")) ? $producto->producto_unidad_x_bulto : old("producto_unidad_x_bulto") }}"/>
                       @if($errors->has("producto_unidad_x_bulto"))
                        <span class="help-block">{{ $errors->first("producto_unidad_x_bulto") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_precio_venta')) has-error @endif">
                       <label for="producto_precio_venta-field">Producto_precio_venta</label>
                    <input type="text" id="producto_precio_venta-field" name="producto_precio_venta" class="form-control" value="{{ is_null(old("producto_precio_venta")) ? $producto->producto_precio_venta : old("producto_precio_venta") }}"/>
                       @if($errors->has("producto_precio_venta"))
                        <span class="help-block">{{ $errors->first("producto_precio_venta") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_precio_costo')) has-error @endif">
                       <label for="producto_precio_costo-field">Producto_precio_costo</label>
                    <input type="text" id="producto_precio_costo-field" name="producto_precio_costo" class="form-control" value="{{ is_null(old("producto_precio_costo")) ? $producto->producto_precio_costo : old("producto_precio_costo") }}"/>
                       @if($errors->has("producto_precio_costo"))
                        <span class="help-block">{{ $errors->first("producto_precio_costo") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_marca_id')) has-error @endif">
                       <label for="fk_marca_id-field">Fk_marca_id</label>
                    <input type="text" id="fk_marca_id-field" name="fk_marca_id" class="form-control" value="{{ is_null(old("fk_marca_id")) ? $producto->fk_marca_id : old("fk_marca_id") }}"/>
                       @if($errors->has("fk_marca_id"))
                        <span class="help-block">{{ $errors->first("fk_marca_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_proveedor_cliente_id')) has-error @endif">
                       <label for="fk_proveedor_cliente_id-field">Fk_proveedor_cliente_id</label>
                    <input type="text" id="fk_proveedor_cliente_id-field" name="fk_proveedor_cliente_id" class="form-control" value="{{ is_null(old("fk_proveedor_cliente_id")) ? $producto->fk_proveedor_cliente_id : old("fk_proveedor_cliente_id") }}"/>
                       @if($errors->has("fk_proveedor_cliente_id"))
                        <span class="help-block">{{ $errors->first("fk_proveedor_cliente_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_rubro_id')) has-error @endif">
                       <label for="fk_rubro_id-field">Fk_rubro_id</label>
                    <input type="text" id="fk_rubro_id-field" name="fk_rubro_id" class="form-control" value="{{ is_null(old("fk_rubro_id")) ? $producto->fk_rubro_id : old("fk_rubro_id") }}"/>
                       @if($errors->has("fk_rubro_id"))
                        <span class="help-block">{{ $errors->first("fk_rubro_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_talla_id')) has-error @endif">
                       <label for="fk_talla_id-field">Fk_talla_id</label>
                    <input type="text" id="fk_talla_id-field" name="fk_talla_id" class="form-control" value="{{ is_null(old("fk_talla_id")) ? $producto->fk_talla_id : old("fk_talla_id") }}"/>
                       @if($errors->has("fk_talla_id"))
                        <span class="help-block">{{ $errors->first("fk_talla_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_color_id')) has-error @endif">
                       <label for="fk_color_id-field">Fk_color_id</label>
                    <input type="text" id="fk_color_id-field" name="fk_color_id" class="form-control" value="{{ is_null(old("fk_color_id")) ? $producto->fk_color_id : old("fk_color_id") }}"/>
                       @if($errors->has("fk_color_id"))
                        <span class="help-block">{{ $errors->first("fk_color_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('productos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
