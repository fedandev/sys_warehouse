@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Caracteristica / Editar #{{$caracteristicas_detalle->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                       <form action="{{ route('caracteristicas_detalles.update', $caracteristicas_detalle->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                     <input type="text" id="caracteristica_detalle_nombre-field" name="caracteristica_detalle_nombre" class="form-control" value="{{ is_null(old('caracteristica_detalle_nombre')) ? $caracteristicas_detalle->caracteristica_detalle_nombre : old('caracteristica_detalle_nombre') }}"/>                        
                                </div>    

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Grupo</label>
                                    <input type="text" id="caracteristica_nombre-field" name="caracteristica_nombre" class="form-control" value="{{ is_null(old('caracteristica_nombre')) ? $caracteristicas_detalle->Caracteristica->caracteristica_nombre : old('caracteristica_nombre') }}" readonly="readonly"/>
                                </div> 

                            </div> 
                            <div class="panel-content">
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a class="btn btn-link pull-right" href="{{ route('caracteristicas_detalles.index') }}"> Volver</a>
                                </div>
                             </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection