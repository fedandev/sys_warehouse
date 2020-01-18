@extends('layout')
@section('header')
<div class="page-header">
        <h1>Sucursals / Show #{{$sucursal->id}}</h1>
        <form action="{{ route('sucursals.destroy', $sucursal->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('sucursals.edit', $sucursal->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="sucursal_nombre">SUCURSAL_NOMBRE</label>
                     <p class="form-control-static">{{$sucursal->sucursal_nombre}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_localidad_id">FK_LOCALIDAD_ID</label>
                     <p class="form-control-static">{{$sucursal->fk_localidad_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('sucursals.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection