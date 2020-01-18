@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Localidad / Editar #{{$localidad->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                       <form action="{{ route('localidades.update', $localidad->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                     <input type="text" id="localidad_nombre-field" name="localidad_nombre" class="form-control" value="{{ is_null(old('localidad_nombre')) ? $localidad->localidad_nombre : old('localidad_nombre') }}"/>
                                </div>    
                                
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">País</label>
                                    <input type="text" id="pais_nombre-field" name="pais_nombre" class="form-control" value="{{ is_null(old('pais_nombre')) ? $localidad->Provincia->Pais->pais_nombre : old('pais_nombre') }}" disabled>
                                </div> 

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Provincia</label>
                                    <input type="text" id="provincia_nombre-field" name="provincia_nombre" class="form-control" value="{{ is_null(old('pronvicia_nombre')) ? $localidad->Provincia->provincia_nombre : old('pronvicia_nombre') }}" disabled>
                                </div>
                            </div> 
                            <div class="panel-content">
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a class="btn btn-link pull-right" href="{{ route('localidades.index') }}"> Volver</a>
                                </div>
                             </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection