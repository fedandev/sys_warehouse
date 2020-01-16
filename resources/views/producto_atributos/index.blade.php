@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Producto_atributos
            <a class="btn btn-success pull-right" href="{{ route('producto_atributos.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($producto_atributos->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PRODUCTO_ATRIBUTO_ALTO</th>
                        <th>PRODUCTO_ATRIBUTO_ANCHO</th>
                        <th>PRODUCTO_ATRIBUTO_PROFUNDIDAD</th>
                        <th>PRODUCTO_ATRIBUTO_PESO</th>
                        <th>PRODUCTO_ATRIBUTO_DEFAULT</th>
                        <th>PRODUCTO_ATRIBUTO_CANTIDAD_MINIMA</th>
                        <th>PRODUCTO_ATRIBUTO_CANTIDAD_MINIMA_ALERTA</th>
                        <th>FK_PRODUCTO_ID</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($producto_atributos as $producto_atributo)
                            <tr>
                                <td>{{$producto_atributo->id}}</td>
                                <td>{{$producto_atributo->producto_atributo_alto}}</td>
                    <td>{{$producto_atributo->producto_atributo_ancho}}</td>
                    <td>{{$producto_atributo->producto_atributo_profundidad}}</td>
                    <td>{{$producto_atributo->producto_atributo_peso}}</td>
                    <td>{{$producto_atributo->producto_atributo_default}}</td>
                    <td>{{$producto_atributo->producto_atributo_cantidad_minima}}</td>
                    <td>{{$producto_atributo->producto_atributo_cantidad_minima_alerta}}</td>
                    <td>{{$producto_atributo->fk_producto_id}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('producto_atributos.show', $producto_atributo->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('producto_atributos.edit', $producto_atributo->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('producto_atributos.destroy', $producto_atributo->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $producto_atributos->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection