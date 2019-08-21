@extends('layouts.app')


@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                         Ajustes / Ver #{{$ajuste->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                    <input type="text" id="ajuste_nombre-field" name="ajuste_nombre" class="form-control" value="{{$ajuste->ajuste_nombre}}" disabled/>                        
                                </div>    

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Valor</label>
                                    <input type="text" id="ajuste_valor-field" name="ajuste_valor" class="form-control" value="{{$ajuste->ajuste_valor}}" disabled/>                      
                                </div> 

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Descripción</label>
                                    <input type="text" id="ajuste_descripcion-field" name="ajuste_descripcion" class="form-control" value="{{$ajuste->ajuste_descripcion}}" disabled/>                   
                                </div> 
                            </div> 
                            <div class="panel-content">
                                <div class="well well-sm">
                                    <form action="{{ route('ajustes.destroy', $ajuste->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que desea eliminar?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="btn-group pull-right" role="group" aria-label="...">
                                            <a class="btn btn-warning btn-group" role="group" href="{{ route('ajustes.edit', $ajuste->id) }}">
                                                <i class="glyphicon glyphicon-edit"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger">Eliminar <i class="glyphicon glyphicon-trash"></i></button>
                                        </div>
                                    </form>
                                    <a class="btn btn-link pull-right" href="{{ route('ajustes.index') }}"> Volver</a>
                                </div>
                             </div> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>    

@endsection



