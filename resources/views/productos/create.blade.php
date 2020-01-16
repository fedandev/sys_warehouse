@extends('layouts.app')

@section('styles')
    <link type="text/css" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />  
    <link rel="stylesheet" media="screen, print" href="{{ secure_asset('css/formplugins/dropzone/dropzone.css') }}">
@endsection

@section('content')
    @include('error')
    <div class="row">
        <div class="col-xl-9">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Nuevo Producto
                    </h2>                   
                </div>
                <div class="panel-container show">
                    <form novalidate="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{csrf_field()}}
                        <div class="panel-content p-0">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_justified-1" role="tab">Configuración básica</a></li>
                                <li class="nav-item" id="cantidades"><a class="nav-link" data-toggle="tab" href="#tab_justified-2" role="tab">Cantidades</a></li>
                                <li class="nav-item" id="combinaciones"><a class="nav-link" data-toggle="tab" href="#tab_justified-3" role="tab">Combinaciones</a></li>
                                <li class="nav-item" id="envio"><a class="nav-link" data-toggle="tab" href="#tab_justified-4" role="tab">Envio</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_justified-5" role="tab">Precio</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_justified-6" role="tab">Otros</a></li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane fade show active" id="tab_justified-1" role="tabpanel">
                                    <!-- Configuración basica -->
                                    @include('productos.basica')
                                </div>
                                <div class="tab-pane fade" id="tab_justified-2" role="tabpanel">
                                    <!-- Cantidades -->
                                    @include('productos.cantidades')
                                </div>
                                <div class="tab-pane fade" id="tab_justified-3" role="tabpanel">
                                    <!-- Combinaciones -->
                                    @include('productos.combinaciones')
                                </div>
                                <div class="tab-pane fade" id="tab_justified-4" role="tabpanel">
                                    <!-- Envio -->
                                    @include('productos.envio')
                                </div>
                                <div class="tab-pane fade" id="tab_justified-5" role="tabpanel">
                                    <!-- Precio -->
                                    @include('productos.precio')
                                </div>
                                <div class="tab-pane fade" id="tab_justified-6" role="tabpanel">
                                    <!-- Otros -->
                                    @include('productos.otros')
                                </div>
                            </div>
                            <div class="panel-content">
                                <div class="form-group">
                                                          
                                </div>
                            </div> 
                            <div class="panel-content">
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a class="btn btn-link pull-right" href="{{ route('productos.index') }}"> Volver</a>
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
@endsection
@include('productos.basica_js')
@section('scripts')
<script src="{{ secure_asset('js/formplugins/dropzone/dropzone.js') }}" type="text/javascript"></script>
<script src="{{ secure_asset('js/logger.js') }}" type="text/javascript"></script>
<script src="{{ secure_asset('js/treeview_multiple.js') }}" type="text/javascript"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }    
    });
    
    $('#treeview-checkbox-demo').treeview({
        debug : true,
        data : []
    });
     
    document.getElementById('combinaciones').style.display = 'none';
      
    Dropzone.options.fileUpload = {
        url: 'url',
        autoProcessQueue: false,
        uploadMultiple: true,
        addRemoveLinks: true,
        accept: function(file) {
          let fileReader = new FileReader();

          fileReader.readAsDataURL(file);
          fileReader.onloadend = function() {

              let content = fileReader.result;
              $('#file').val(content);
              file.previewElement.classList.add("dz-success");
          }
          file.previewElement.classList.add("dz-complete");
        }
    }
  </script>
@endsection

