@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                         Característica / Ver #{{$caracteristicas_detalle->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-content">
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Nombre</label>
                                <input type="text" id="caracteristica_detalle_nombre-field" name="caracteristica_detalle_nombre" class="form-control" value="{{$caracteristicas_detalle->caracteristica_detalle_nombre}}" disabled/>                        
                            </div>    

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Grupo</label>
                                <input type="text" id="caracteristica_nombre-field" name="caracteristica_nombre" class="form-control" value="{{$caracteristicas_detalle->Caracteristica->caracteristica_nombre}}" disabled/>                      
                            </div> 

                        </div> 
                        <div class="panel-content">
                            <div class="well well-sm">
                                <form action="{{ route('caracteristicas_detalles.destroy', $caracteristicas_detalle->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que desea eliminar?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                        <a class="btn btn-warning btn-group" role="group" href="{{ route('caracteristicas_detalles.edit', $caracteristicas_detalle->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                                        <button type="submit" class="btn btn-danger">Eliminar <i class="glyphicon glyphicon-trash"></i></button>
                                    </div>
                                </form>
                                <a class="btn btn-link pull-right" href="{{ route('caracteristicas_detalles.index') }}"> Volver</a>
                            </div>
                         </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection