@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Clientes / Edit #{{$cliente->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('cliente_ruc')) has-error @endif">
                       <label for="cliente_ruc-field">Cliente_RUC</label>
                    <input type="text" id="cliente_ruc-field" name="cliente_ruc" class="form-control" value="{{ is_null(old("cliente_ruc")) ? $cliente->cliente_ruc : old("cliente_ruc") }}"/>
                       @if($errors->has("cliente_ruc"))
                        <span class="help-block">{{ $errors->first("cliente_ruc") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cliente_cedula')) has-error @endif">
                       <label for="cliente_cedula-field">Cliente_cedula</label>
                    <input type="text" id="cliente_cedula-field" name="cliente_cedula" class="form-control" value="{{ is_null(old("cliente_cedula")) ? $cliente->cliente_cedula : old("cliente_cedula") }}"/>
                       @if($errors->has("cliente_cedula"))
                        <span class="help-block">{{ $errors->first("cliente_cedula") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cliente_nombre')) has-error @endif">
                       <label for="cliente_nombre-field">Cliente_nombre</label>
                    <input type="text" id="cliente_nombre-field" name="cliente_nombre" class="form-control" value="{{ is_null(old("cliente_nombre")) ? $cliente->cliente_nombre : old("cliente_nombre") }}"/>
                       @if($errors->has("cliente_nombre"))
                        <span class="help-block">{{ $errors->first("cliente_nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cliente_apellido')) has-error @endif">
                       <label for="cliente_apellido-field">Cliente_apellido</label>
                    <input type="text" id="cliente_apellido-field" name="cliente_apellido" class="form-control" value="{{ is_null(old("cliente_apellido")) ? $cliente->cliente_apellido : old("cliente_apellido") }}"/>
                       @if($errors->has("cliente_apellido"))
                        <span class="help-block">{{ $errors->first("cliente_apellido") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cliente_direccion')) has-error @endif">
                       <label for="cliente_direccion-field">Cliente_direccion</label>
                    <input type="text" id="cliente_direccion-field" name="cliente_direccion" class="form-control" value="{{ is_null(old("cliente_direccion")) ? $cliente->cliente_direccion : old("cliente_direccion") }}"/>
                       @if($errors->has("cliente_direccion"))
                        <span class="help-block">{{ $errors->first("cliente_direccion") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cliente_telefono1')) has-error @endif">
                       <label for="cliente_telefono1-field">Cliente_telefono1</label>
                    <input type="text" id="cliente_telefono1-field" name="cliente_telefono1" class="form-control" value="{{ is_null(old("cliente_telefono1")) ? $cliente->cliente_telefono1 : old("cliente_telefono1") }}"/>
                       @if($errors->has("cliente_telefono1"))
                        <span class="help-block">{{ $errors->first("cliente_telefono1") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cliente_telefono2')) has-error @endif">
                       <label for="cliente_telefono2-field">Cliente_telefono2</label>
                    <input type="text" id="cliente_telefono2-field" name="cliente_telefono2" class="form-control" value="{{ is_null(old("cliente_telefono2")) ? $cliente->cliente_telefono2 : old("cliente_telefono2") }}"/>
                       @if($errors->has("cliente_telefono2"))
                        <span class="help-block">{{ $errors->first("cliente_telefono2") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cliente_calle')) has-error @endif">
                       <label for="cliente_calle-field">Cliente_calle</label>
                    <input type="text" id="cliente_calle-field" name="cliente_calle" class="form-control" value="{{ is_null(old("cliente_calle")) ? $cliente->cliente_calle : old("cliente_calle") }}"/>
                       @if($errors->has("cliente_calle"))
                        <span class="help-block">{{ $errors->first("cliente_calle") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_localidad_id')) has-error @endif">
                       <label for="fk_localidad_id-field">Fk_localidad_id</label>
                    <input type="text" id="fk_localidad_id-field" name="fk_localidad_id" class="form-control" value="{{ is_null(old("fk_localidad_id")) ? $cliente->fk_localidad_id : old("fk_localidad_id") }}"/>
                       @if($errors->has("fk_localidad_id"))
                        <span class="help-block">{{ $errors->first("fk_localidad_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('clientes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
