@extends('layout')
@section('header')
<div class="page-header">
        <h1>Producto_atributos / Show #{{$producto_atributo->id}}</h1>
        <form action="{{ route('producto_atributos.destroy', $producto_atributo->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('producto_atributos.edit', $producto_atributo->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="producto_atributo_alto">PRODUCTO_ATRIBUTO_ALTO</label>
                     <p class="form-control-static">{{$producto_atributo->producto_atributo_alto}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_atributo_ancho">PRODUCTO_ATRIBUTO_ANCHO</label>
                     <p class="form-control-static">{{$producto_atributo->producto_atributo_ancho}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_atributo_profundidad">PRODUCTO_ATRIBUTO_PROFUNDIDAD</label>
                     <p class="form-control-static">{{$producto_atributo->producto_atributo_profundidad}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_atributo_peso">PRODUCTO_ATRIBUTO_PESO</label>
                     <p class="form-control-static">{{$producto_atributo->producto_atributo_peso}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_atributo_default">PRODUCTO_ATRIBUTO_DEFAULT</label>
                     <p class="form-control-static">{{$producto_atributo->producto_atributo_default}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_atributo_cantidad_minima">PRODUCTO_ATRIBUTO_CANTIDAD_MINIMA</label>
                     <p class="form-control-static">{{$producto_atributo->producto_atributo_cantidad_minima}}</p>
                </div>
                    <div class="form-group">
                     <label for="producto_atributo_cantidad_minima_alerta">PRODUCTO_ATRIBUTO_CANTIDAD_MINIMA_ALERTA</label>
                     <p class="form-control-static">{{$producto_atributo->producto_atributo_cantidad_minima_alerta}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_producto_id">FK_PRODUCTO_ID</label>
                     <p class="form-control-static">{{$producto_atributo->fk_producto_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('producto_atributos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection