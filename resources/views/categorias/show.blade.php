@extends('layout')
@section('header')
<div class="page-header">
        <h1>Categorias / Show #{{$categorium->id}}</h1>
        <form action="{{ route('categorias.destroy', $categorium->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('categorias.edit', $categorium->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="categoria_padre">CATEGORIA_PADRE</label>
                     <p class="form-control-static">{{$categorium->categoria_padre}}</p>
                </div>
                    <div class="form-group">
                     <label for="categoria_activo">CATEGORIA_ACTIVO</label>
                     <p class="form-control-static">{{$categorium->categoria_activo}}</p>
                </div>
                    <div class="form-group">
                     <label for="categoria_posicion">CATEGORIA_POSICION</label>
                     <p class="form-control-static">{{$categorium->categoria_posicion}}</p>
                </div>
                    <div class="form-group">
                     <label for="categoria_nombre">CATEGORIA_NOMBRE</label>
                     <p class="form-control-static">{{$categorium->categoria_nombre}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('categorias.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection