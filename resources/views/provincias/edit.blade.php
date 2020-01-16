@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Provincias / Editar #{{$provincia->id}}
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                       <form action="{{ route('provincias.update', $provincia->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                     <input type="text" id="provincia_nombre-field" name="provincia_nombre" class="form-control" value="{{ is_null(old('provincia_nombre')) ? $provincia->provincia_nombre : old('provincia_nombre') }}"/>                        
                                </div>    

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">País</label>
                                    <select class="select2_demo_2 form-control" name="fk_pais_id" id="fk_pais_id-field" value="{{ old('fk_pais_id', $provincia->fk_pais_id ) }}">
                                        <option value="{{$provincia->fk_pais_id}}">{{$provincia->pais->pais_nombre}}</option>
                                        @include('layouts.paises')
                                    </select>
                                </div> 
                            </div> 
                            <div class="panel-content">
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a class="btn btn-link pull-right" href="{{ route('provincias.index') }}"> Volver</a>
                                </div>
                             </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection