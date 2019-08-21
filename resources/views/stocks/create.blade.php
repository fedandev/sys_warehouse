@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Stocks / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('stocks.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('stock_cantidad')) has-error @endif">
                       <label for="stock_cantidad-field">Stock_cantidad</label>
                    <input type="text" id="stock_cantidad-field" name="stock_cantidad" class="form-control" value="{{ old("stock_cantidad") }}"/>
                       @if($errors->has("stock_cantidad"))
                        <span class="help-block">{{ $errors->first("stock_cantidad") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_producto_id')) has-error @endif">
                       <label for="fk_producto_id-field">Fk_producto_id</label>
                    <input type="text" id="fk_producto_id-field" name="fk_producto_id" class="form-control" value="{{ old("fk_producto_id") }}"/>
                       @if($errors->has("fk_producto_id"))
                        <span class="help-block">{{ $errors->first("fk_producto_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fk_sucursals_id')) has-error @endif">
                       <label for="fk_sucursals_id-field">Fk_sucursals_id</label>
                    <input type="text" id="fk_sucursals_id-field" name="fk_sucursals_id" class="form-control" value="{{ old("fk_sucursals_id") }}"/>
                       @if($errors->has("fk_sucursals_id"))
                        <span class="help-block">{{ $errors->first("fk_sucursals_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('stocks.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
