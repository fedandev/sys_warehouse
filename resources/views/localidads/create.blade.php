@extends('layouts.app')

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Nueva Localidad
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <form action="{{ route('localidades.store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                     <input type="text" id="localidad_nombre-field" name="localidad_nombre" class="form-control" value="{{ old('localidad_nombre') }}"/>                        
                                </div>    

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">País</label>
                                    <select class="select2_demo_2 form-control" name="pais_nombre" id="pais_nombre-field" value="{{ old('pais_id') }}">
                                        <option value=''> Seleccione un país </option>
                                        @include('layouts.paises')
                                    </select>
                                </div> 

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Provincia</label>
                                    <select class="select2_demo_2 form-control" name="fk_provincia_id" id="fk_provincia_id-field" value="{{ old('fk_provincia_id') }}">
                                        
                                    </select>
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

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#pais_nombre-field").change(function(event){
                $.get(`../../provincias/${event.target.value}`, function(res, sta){
                    $('#fk_provincia_id-field').empty();
                    if(res.length>=0){
                      $("#fk_provincia_id-field").append('<option> Seleccione una provincia.</option>');
                          res.forEach(element => {
                              $('#fk_provincia_id-field').append(`<option value=${element.id}> ${element.provincia_nombre} </option>`);
                          });
		                }
                });
            });
        });
    </script>
@endsection