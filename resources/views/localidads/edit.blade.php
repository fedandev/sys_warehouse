@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Localidads / Edit #{{$localidad->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('localidads.update', $localidad->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('localidad_nombre')) has-error @endif">
                       <label for="localidad_nombre-field">Localidad_nombre</label>
                    <input type="text" id="localidad_nombre-field" name="localidad_nombre" class="form-control" value="{{ is_null(old("localidad_nombre")) ? $localidad->localidad_nombre : old("localidad_nombre") }}"/>
                       @if($errors->has("localidad_nombre"))
                        <span class="help-block">{{ $errors->first("localidad_nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_provincia_id')) has-error @endif">
                       <label for="fk_provincia_id-field">Fk_provincia_id</label>
                    <input type="text" id="fk_provincia_id-field" name="fk_provincia_id" class="form-control" value="{{ is_null(old("fk_provincia_id")) ? $localidad->fk_provincia_id : old("fk_provincia_id") }}"/>
                       @if($errors->has("fk_provincia_id"))
                        <span class="help-block">{{ $errors->first("fk_provincia_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('localidads.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
