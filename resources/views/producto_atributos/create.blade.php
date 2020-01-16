@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Producto_atributos / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('producto_atributos.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('producto_atributo_alto')) has-error @endif">
                       <label for="producto_atributo_alto-field">Producto_atributo_alto</label>
                    <input type="text" id="producto_atributo_alto-field" name="producto_atributo_alto" class="form-control" value="{{ old("producto_atributo_alto") }}"/>
                       @if($errors->has("producto_atributo_alto"))
                        <span class="help-block">{{ $errors->first("producto_atributo_alto") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_atributo_ancho')) has-error @endif">
                       <label for="producto_atributo_ancho-field">Producto_atributo_ancho</label>
                    <input type="text" id="producto_atributo_ancho-field" name="producto_atributo_ancho" class="form-control" value="{{ old("producto_atributo_ancho") }}"/>
                       @if($errors->has("producto_atributo_ancho"))
                        <span class="help-block">{{ $errors->first("producto_atributo_ancho") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_atributo_profundidad')) has-error @endif">
                       <label for="producto_atributo_profundidad-field">Producto_atributo_profundidad</label>
                    <input type="text" id="producto_atributo_profundidad-field" name="producto_atributo_profundidad" class="form-control" value="{{ old("producto_atributo_profundidad") }}"/>
                       @if($errors->has("producto_atributo_profundidad"))
                        <span class="help-block">{{ $errors->first("producto_atributo_profundidad") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_atributo_peso')) has-error @endif">
                       <label for="producto_atributo_peso-field">Producto_atributo_peso</label>
                    <input type="text" id="producto_atributo_peso-field" name="producto_atributo_peso" class="form-control" value="{{ old("producto_atributo_peso") }}"/>
                       @if($errors->has("producto_atributo_peso"))
                        <span class="help-block">{{ $errors->first("producto_atributo_peso") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_atributo_default')) has-error @endif">
                       <label for="producto_atributo_default-field">Producto_atributo_default</label>
                    <input type="text" id="producto_atributo_default-field" name="producto_atributo_default" class="form-control" value="{{ old("producto_atributo_default") }}"/>
                       @if($errors->has("producto_atributo_default"))
                        <span class="help-block">{{ $errors->first("producto_atributo_default") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_atributo_cantidad_minima')) has-error @endif">
                       <label for="producto_atributo_cantidad_minima-field">Producto_atributo_cantidad_minima</label>
                    <input type="text" id="producto_atributo_cantidad_minima-field" name="producto_atributo_cantidad_minima" class="form-control" value="{{ old("producto_atributo_cantidad_minima") }}"/>
                       @if($errors->has("producto_atributo_cantidad_minima"))
                        <span class="help-block">{{ $errors->first("producto_atributo_cantidad_minima") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('producto_atributo_cantidad_minima_alerta')) has-error @endif">
                       <label for="producto_atributo_cantidad_minima_alerta-field">Producto_atributo_cantidad_minima_alerta</label>
                    <input type="text" id="producto_atributo_cantidad_minima_alerta-field" name="producto_atributo_cantidad_minima_alerta" class="form-control" value="{{ old("producto_atributo_cantidad_minima_alerta") }}"/>
                       @if($errors->has("producto_atributo_cantidad_minima_alerta"))
                        <span class="help-block">{{ $errors->first("producto_atributo_cantidad_minima_alerta") }}</span>
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
                    <a class="btn btn-link pull-right" href="{{ route('producto_atributos.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
