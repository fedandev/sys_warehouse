@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Ajustes / Editar #{{$ajuste->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                       <form action="{{ route('ajustes.update', $ajuste->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                     <input type="text" id="ajuste_nombre-field" name="ajuste_nombre" class="form-control" value="{{ is_null(old('ajuste_nombre')) ? $ajuste->ajuste_nombre : old('ajuste_nombre') }}"/>                        
                                </div>    

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Valor</label>
                                    <input type="text" id="ajuste_valor-field" name="ajuste_valor" class="form-control" value="{{ is_null(old('ajuste_valor')) ? $ajuste->ajuste_valor : old('ajuste_valor') }}"/>                      
                                </div> 

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Descripción</label>
                                    <input type="text" id="ajuste_descripcion-field" name="ajuste_descripcion" class="form-control" value="{{ is_null(old('ajuste_descripcion')) ? $ajuste->ajuste_descripcion : old('ajuste_descripcion') }}"/>                   
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



