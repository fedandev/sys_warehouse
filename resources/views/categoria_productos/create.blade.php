@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Categoria_productos / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('categoria_productos.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('categoria_producto_posicion')) has-error @endif">
                       <label for="categoria_producto_posicion-field">Categoria_producto_posicion</label>
                    <input type="text" id="categoria_producto_posicion-field" name="categoria_producto_posicion" class="form-control" value="{{ old("categoria_producto_posicion") }}"/>
                       @if($errors->has("categoria_producto_posicion"))
                        <span class="help-block">{{ $errors->first("categoria_producto_posicion") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_categoria_id')) has-error @endif">
                       <label for="fk_categoria_id-field">Fk_categoria_id</label>
                    <input type="text" id="fk_categoria_id-field" name="fk_categoria_id" class="form-control" value="{{ old("fk_categoria_id") }}"/>
                       @if($errors->has("fk_categoria_id"))
                        <span class="help-block">{{ $errors->first("fk_categoria_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_producto_id')) has-error @endif">
                       <label for="fk_producto_id-field">Fk_producto_id</label>
                    <input type="text" id="fk_producto_id-field" name="fk_producto_id" class="form-control" value="{{ old("fk_producto_id") }}"/>
                       @if($errors->has("fk_producto_id"))
                        <span class="help-block">{{ $errors->first("fk_producto_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('categoria_productos.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
