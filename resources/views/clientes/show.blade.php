@extends('layout')
@section('header')
<div class="page-header">
        <h1>Clientes / Show #{{$cliente->id}}</h1>
        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('clientes.edit', $cliente->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="cliente_ruc">CLIENTE_RUC</label>
                     <p class="form-control-static">{{$cliente->cliente_ruc}}</p>
                </div>
                    <div class="form-group">
                     <label for="cliente_cedula">CLIENTE_CEDULA</label>
                     <p class="form-control-static">{{$cliente->cliente_cedula}}</p>
                </div>
                    <div class="form-group">
                     <label for="cliente_nombre">CLIENTE_NOMBRE</label>
                     <p class="form-control-static">{{$cliente->cliente_nombre}}</p>
                </div>
                    <div class="form-group">
                     <label for="cliente_apellido">CLIENTE_APELLIDO</label>
                     <p class="form-control-static">{{$cliente->cliente_apellido}}</p>
                </div>
                    <div class="form-group">
                     <label for="cliente_direccion">CLIENTE_DIRECCION</label>
                     <p class="form-control-static">{{$cliente->cliente_direccion}}</p>
                </div>
                    <div class="form-group">
                     <label for="cliente_telefono1">CLIENTE_TELEFONO1</label>
                     <p class="form-control-static">{{$cliente->cliente_telefono1}}</p>
                </div>
                    <div class="form-group">
                     <label for="cliente_telefono2">CLIENTE_TELEFONO2</label>
                     <p class="form-control-static">{{$cliente->cliente_telefono2}}</p>
                </div>
                    <div class="form-group">
                     <label for="cliente_calle">CLIENTE_CALLE</label>
                     <p class="form-control-static">{{$cliente->cliente_calle}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_localidad_id">FK_LOCALIDAD_ID</label>
                     <p class="form-control-static">{{$cliente->fk_localidad_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('clientes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection