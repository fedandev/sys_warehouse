@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Provincias / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('provincias.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('provincia_nombre')) has-error @endif">
                       <label for="provincia_nombre-field">Provincia_nombre</label>
                    <input type="text" id="provincia_nombre-field" name="provincia_nombre" class="form-control" value="{{ old("provincia_nombre") }}"/>
                       @if($errors->has("provincia_nombre"))
                        <span class="help-block">{{ $errors->first("provincia_nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_pais_id')) has-error @endif">
                       <label for="fk_pais_id-field">Fk_pais_id</label>
                    <input type="text" id="fk_pais_id-field" name="fk_pais_id" class="form-control" value="{{ old("fk_pais_id") }}"/>
                       @if($errors->has("fk_pais_id"))
                        <span class="help-block">{{ $errors->first("fk_pais_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('provincias.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
