@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                         Atributo / Ver #{{$atributo->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-content">
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Nombre</label>
                                <input type="text" id="atributo_nombre-field" name="atributo_nombre" class="form-control" value="{{$atributo->atributo_nombre}}" disabled/>                        
                            </div>    

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Color</label>
                                <input type="text" id="atributo_color-field" name="atributo_color" class="form-control" value="{{$atributo->atributo_color}}" disabled/>                      
                            </div> 

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Posición</label>
                                <input type="text" id="atributo_posicion-field" name="atributo_posicion" class="form-control" value="{{$atributo->atributo_posicion}}" disabled/>                   
                            </div>
                          
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Grupo</label>
                                <input type="text" id="fk_grupo_atributo_id-field" name="fk_grupo_atributo_id" class="form-control" value="{{$atributo->Grupo_Atributo->grupo_atributo_nombre}}" disabled/>                   
                            </div> 
                        </div> 
                        <div class="panel-content">
                            <div class="well well-sm">
                                <form action="{{ route('atributos.destroy', $atributo->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que desea eliminar?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                        <a class="btn btn-warning btn-group" role="group" href="{{ route('atributos.edit', $atributo->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                                        <button type="submit" class="btn btn-danger">Eliminar <i class="glyphicon glyphicon-trash"></i></button>
                                    </div>
                                </form>
                                <a class="btn btn-link pull-right" href="{{ route('atributos.index') }}"> Volver</a>
                            </div>
                         </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection