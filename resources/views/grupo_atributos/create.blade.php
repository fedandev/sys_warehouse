@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Nuevo Ajuste
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <form action="{{ route('grupo_atributos.store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                     <input type="text" id="grupo_atributo_nombre-field" name="grupo_atributo_nombre" class="form-control" value="{{ old('grupo_atributo_nombre') }}"/>                        
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre público</label>
                                    <input type="text" id="grupo_atributo_nombre_publico-field" name="grupo_atributo_nombre_publico" class="form-control" value="{{ old('grupo_atributo_nombre_publico') }}"/>                      
                                </div> 
                            </div> 
                            <div class="panel-content">
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a class="btn btn-link pull-right" href="{{ route('grupo_atributos.index') }}"> Volver</a>
                                </div>
                             </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection