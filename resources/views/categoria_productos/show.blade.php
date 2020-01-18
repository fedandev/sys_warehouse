@extends('layout')
@section('header')
<div class="page-header">
        <h1>Categoria_productos / Show #{{$categoria_producto->id}}</h1>
        <form action="{{ route('categoria_productos.destroy', $categoria_producto->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('categoria_productos.edit', $categoria_producto->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="categoria_producto_posicion">CATEGORIA_PRODUCTO_POSICION</label>
                     <p class="form-control-static">{{$categoria_producto->categoria_producto_posicion}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_categoria_id">FK_CATEGORIA_ID</label>
                     <p class="form-control-static">{{$categoria_producto->fk_categoria_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_producto_id">FK_PRODUCTO_ID</label>
                     <p class="form-control-static">{{$categoria_producto->fk_producto_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('categoria_productos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection