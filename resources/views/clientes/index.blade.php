@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Clientes
            <a class="btn btn-success pull-right" href="{{ route('clientes.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($clientes->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CLIENTE_RUC</th>
                        <th>CLIENTE_CEDULA</th>
                        <th>CLIENTE_NOMBRE</th>
                        <th>CLIENTE_APELLIDO</th>
                        <th>CLIENTE_DIRECCION</th>
                        <th>CLIENTE_TELEFONO1</th>
                        <th>CLIENTE_TELEFONO2</th>
                        <th>CLIENTE_CALLE</th>
                        <th>FK_LOCALIDAD_ID</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->cliente_ruc}}</td>
                    <td>{{$cliente->cliente_cedula}}</td>
                    <td>{{$cliente->cliente_nombre}}</td>
                    <td>{{$cliente->cliente_apellido}}</td>
                    <td>{{$cliente->cliente_direccion}}</td>
                    <td>{{$cliente->cliente_telefono1}}</td>
                    <td>{{$cliente->cliente_telefono2}}</td>
                    <td>{{$cliente->cliente_calle}}</td>
                    <td>{{$cliente->fk_localidad_id}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('clientes.show', $cliente->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('clientes.edit', $cliente->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $clientes->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection