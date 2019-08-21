@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Productos
            <a class="btn btn-success pull-right" href="{{ route('productos.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($productos->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PRODUCTO_CODIGO_INTERNO</th>
                        <th>PRODUCTO_CODIGO_PROVEEDOR</th>
                        <th>PRODUCTO_CODIGO_BARRAS</th>
                        <th>PRODUCTO_IMAGEN</th>
                        <th>PRODUCTO_DESCRIPCION</th>
                        <th>PRODUCTO_UNIDAD_X_BULTO</th>
                        <th>PRODUCTO_PRECIO_VENTA</th>
                        <th>PRODUCTO_PRECIO_COSTO</th>
                        <th>FK_MARCA_ID</th>
                        <th>FK_PROVEEDOR_CLIENTE_ID</th>
                        <th>FK_RUBRO_ID</th>
                        <th>FK_TALLA_ID</th>
                        <th>FK_COLOR_ID</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{$producto->id}}</td>
                                <td>{{$producto->producto_codigo_interno}}</td>
                    <td>{{$producto->producto_codigo_proveedor}}</td>
                    <td>{{$producto->producto_codigo_barras}}</td>
                    <td>{{$producto->producto_imagen}}</td>
                    <td>{{$producto->producto_descripcion}}</td>
                    <td>{{$producto->producto_unidad_x_bulto}}</td>
                    <td>{{$producto->producto_precio_venta}}</td>
                    <td>{{$producto->producto_precio_costo}}</td>
                    <td>{{$producto->fk_marca_id}}</td>
                    <td>{{$producto->fk_proveedor_cliente_id}}</td>
                    <td>{{$producto->fk_rubro_id}}</td>
                    <td>{{$producto->fk_talla_id}}</td>
                    <td>{{$producto->fk_color_id}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('productos.show', $producto->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('productos.edit', $producto->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $productos->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection