@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Atributo / Editar #{{$atributo->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                       <form action="{{ route('atributos.update', $atributo->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                     <input type="text" id="atributo_nombre-field" name="atributo_nombre" class="form-control" value="{{ is_null(old('atributo_nombre')) ? $atributo->atributo_nombre : old('atributo_nombre') }}"/>
                                </div>    

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Color</label>
                                    <input type="text" id="atributo_color-field" name="atributo_color" class="form-control" value="{{ is_null(old('atributo_color')) ? $atributo->atributo_color : old('atributo_color') }}"/>                      
                                </div> 

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Posición</label>
                                    <input type="text" id="atributo_posicion-field" name="atributo_posicion" class="form-control" value="{{ is_null(old('atributo_posicion')) ? $atributo->atributo_posicion : old('atributo_posicion') }}"/>                   
                                </div>
                              
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Descripción</label>
                                    <input type="text" id="fk_grupo_atributo_id-field" name="fk_grupo_atributo_id" class="form-control" value="{{ is_null(old('grupo_atributo_nombre')) ? $atributo->Grupo_Atributo->grupo_atributo_nombre : old('grupo_atributo_nombre') }}"/ readonly="readonly">                   
                                </div> 
                            </div> 
                            <div class="panel-content">
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a class="btn btn-link pull-right" href="{{ route('ajustes.index') }}"> Volver</a>
                                </div>
                             </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection