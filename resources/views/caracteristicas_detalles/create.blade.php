@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Nueva característica
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <form action="{{ route('caracteristicas_detalles.store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div classwaaawawas="panel-content">
                                <div class="panel-content">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                    <input type="text" id="caracteristica_detalle_nombre-field" name="caracteristica_detalle_nombre" class="form-control" value="{{ old('caracteristica_detalle_nombre') }}"/>                        
                                </div>    

                                <div class="panel-content">
                                    <label class="form-label" for="simpleinput">Grupo</label>
                                    <select class="select2_demo_2 form-control" name="fk_caracteristica_id" id="fk_caracteristica_id-field" value="{{ old('fk_caracteristica_id') }}">
                                      <option value="">Seleccione un grupo...</option>  
                                      @include('layouts.grupo_caracteristicas')
                                    </select>                      
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