@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Rubros / Edit #{{$rubro->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('rubros.update', $rubro->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('rubro_nombre')) has-error @endif">
                       <label for="rubro_nombre-field">Rubro_nombre</label>
                    <input type="text" id="rubro_nombre-field" name="rubro_nombre" class="form-control" value="{{ is_null(old("rubro_nombre")) ? $rubro->rubro_nombre : old("rubro_nombre") }}"/>
                       @if($errors->has("rubro_nombre"))
                        <span class="help-block">{{ $errors->first("rubro_nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('rubro_descripcion')) has-error @endif">
                       <label for="rubro_descripcion-field">Rubro_descripcion</label>
                    <input type="text" id="rubro_descripcion-field" name="rubro_descripcion" class="form-control" value="{{ is_null(old("rubro_descripcion")) ? $rubro->rubro_descripcion : old("rubro_descripcion") }}"/>
                       @if($errors->has("rubro_descripcion"))
                        <span class="help-block">{{ $errors->first("rubro_descripcion") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('rubros.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
