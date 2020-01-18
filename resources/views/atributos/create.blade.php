@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Nuevo Atributo
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <form action="{{ route('atributos.store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                     <input type="text" id="atributo_nombre-field" name="atributo_nombre" class="form-control" value="{{ old('atributo_nombre') }}"/>                        
                                </div>    

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Color</label>
                                    <input type="text" id="atributo_color-field" name="atributo_color" class="form-control" value="{{ old('atributo_color') }}"/>                      
                                </div> 

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Posición</label>
                                    <input type="text" id="atributo_posicion-field" name="atributo_posicion" class="form-control" value="{{ old('atributo_posicion') }}"/>                   
                                </div>
                              
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Grupo</label>
                                    <select class="select2_demo_2 form-control" name="fk_grupo_atributo_id" id="fk_grupo_atributo_id-field" value="{{ old('fk_grupo_atributo_id') }}">
                                      <option value="">Seleccione un grupo...</option>  
                                      @include('layouts.grupo_atributos')
                                    </select>
                                </div> 
                            </div> 
                            <div class="panel-content">
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a class="btn btn-link pull-right" href="{{ route('atributos.index') }}"> Volver</a>
                                </div>
                             </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection