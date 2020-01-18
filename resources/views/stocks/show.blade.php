@extends('layout')
@section('header')
<div class="page-header">
        <h1>Stocks / Show #{{$stock->id}}</h1>
        <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('stocks.edit', $stock->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="stock_cantidad">STOCK_CANTIDAD</label>
                     <p class="form-control-static">{{$stock->stock_cantidad}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_producto_id">FK_PRODUCTO_ID</label>
                     <p class="form-control-static">{{$stock->fk_producto_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="fk_sucursals_id">FK_SUCURSALS_ID</label>
                     <p class="form-control-static">{{$stock->fk_sucursals_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('stocks.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection