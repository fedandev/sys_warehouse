@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                         Provincia / Ver #{{$provincia->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-content">
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Nombre</label>
                                <input type="text" id="provincia_nombre-field" name="provincia_nombre" class="form-control" value="{{$provincia->provincia_nombre}}" disabled/>                        
                            </div>    
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">País</label>
                                <input type="text" id="fk_pais_id-field" name="fk_pais_id" class="form-control" value="{{$provincia->pais->pais_nombre}}" disabled/>                      
                            </div> 
                        </div> 
                        <div class="panel-content">
                            <div class="well well-sm">
                                <form action="{{ route('provincias.destroy', $provincia->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que desea eliminar?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                        <a class="btn btn-warning btn-group" role="group" href="{{ route('provincias.edit', $provincia->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                                        <button type="submit" class="btn btn-danger">Eliminar <i class="glyphicon glyphicon-trash"></i></button>
                                    </div>
                                </form>
                                <a class="btn btn-link pull-right" href="{{ route('provincias.index') }}"> Volver</a>
                            </div>
                         </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection