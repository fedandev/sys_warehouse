@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                         Grupo de Características / Ver #{{$caracteristica->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-content">
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Nombre</label>
                                <input type="text" id="caracteristica_nombre-field" name="caracteristica_nombre" class="form-control" value="{{$caracteristica->caracteristica_nombre}}" disabled/>
                            </div>
                        </div> 
                        <div class="panel-content">
                            <div class="well well-sm">
                                <form action="{{ route('grupos_caracteristicas.destroy', $caracteristica->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que desea eliminar?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                        <a class="btn btn-warning btn-group" role="group" href="{{ route('grupos_caracteristicas.edit', $caracteristica->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                                        <button type="submit" class="btn btn-danger">Eliminar <i class="glyphicon glyphicon-trash"></i></button>
                                    </div>
                                </form>
                                <a class="btn btn-link pull-right" href="{{ route('grupos_caracteristicas.index') }}"> Volver</a>
                            </div>
                         </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection