@extends('layouts.app')

@section('styles')
    <link type="text/css" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />    
@endsection

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Nueva categoría
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <form action="{{ route('categorias.store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Nombre</label>
                                     <input type="text" id="categoria_nombre-field" name="categoria_nombre" class="form-control" value="{{ old('categoria_nombre') }}"/>                        
                                </div>    

                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Padre</label>
                                    <input type="hidden" name="categoria_padre" id="categoria_padre-field" value="{{ old('categoria_padre') }}">
                                    <div id="treeview-checkbox-demo">                                            
                                        <ul>
                                            @each('categorias.tree', $categorias, 'categoria')
                                        </ul>
                                    </div>
                                </div>
                              
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Descripción</label>
                                    <input type="text" id="categoria_descripcion-field" name="categoria_descripcion" class="form-control" value="{{ old('categoria_descripcion') }}"/>         
                                </div>
                              
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Activo</label>
                                    <select class="select2_demo_2 form-control" name="categoria_activo" id="categoria_activo-field" value="{{ old('categoria_activo') }}">
                                      <option value="1">Activo</option>  
                                      <option value="0">Baja</option>
                                    </select>   
                                </div> 
                            </div> 
                            <div class="panel-content">
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a class="btn btn-link pull-right" href="{{ secure_url('categorias') }}"> Volver</a>
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
    <script src="{{ secure_asset('js/logger.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/treeview.js') }}" type="text/javascript"></script>
    <script>
        $('#treeview-checkbox-demo').treeview({
            debug : true,
            data : []
        });
    </script>
  
@endsection