@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" media="screen, print" href="{{ secure_asset('css/datagrid/datatables/datatables.bundle.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2> Grupo de Atributos</h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-xl-12">
                                <table id="dt_table" class="table table-bordered table-hover table-striped w-100 table-sm" >
                                    <thead class="bg-primary-500">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Nombre Público</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($grupo_atributos as $grupo_atributo)
                                        <tr>
                                            <td>{{ $grupo_atributo->id }} </td>
                                            <td>{{ $grupo_atributo->grupo_atributo_nombre }}</td>
                                            <td>{{ $grupo_atributo->grupo_atributo_nombre_publico }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                     
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ secure_asset('js/datagrid/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            
            
            var table = $('#dt_table').dataTable({
                responsive: true,
                select: { style: 'single' },
                dom:                       
                    "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [                        
                    {
                        text: 'Borrar',
                        titleAttr: 'Borrar',
                        className: 'btn buttons-selected btn-danger',
                        action: function ( e, dt, node, config ) {
                                    console.log('Borrar.Click event');                            
                                    var data = dt.row({selected: true}).data();   
                                    if(data){
                                        var id = data[0];
                                        var url = "{{ secure_url('grupo_atributos') }}";
                                        bootbox.confirm({
                                            title: "Eliminar",
                                            message: "Esta seguro que desea eliminar?",
                                            buttons:
                                            {
                                                cancel:
                                                {
                                                    label: '<i class="fa fa-times"></i> Cancelar'
                                                },
                                                confirm:
                                                {
                                                    label: '<i class="fa fa-check"></i> Confirmar'
                                                }
                                            },
                                            callback: function(result)
                                            {
                                                if(result){             
                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });                    
                                                    var type = "DELETE";                                                
                                                    //var ajaxurl = "{{ secure_url('ajustes') }}";                     
                                                    $.ajax({
                                                        type: type,
                                                        url: url+'/'+id , 
                                                        dataType: 'json',
                                                        contentType: "application/json",
                                                        data: {
                                                            _token: jQuery('meta[name="csrf-token"]').attr('content')
                                                        },                           
                                                        success: function (data) {               
                                                            console.log("DELETE OK:" ,data);
                                                            window.location.href = url; 
                                                        },
                                                        error: function (data) {
                                                            console.log('DELETE Error:', data);
                                                        }
                                                    });

                                                }

                                            }
                                        
                                        });
                                    }                                     
                                }
                    },
                    {                           
                        text: 'Editar',
                        titleAttr: 'Editar',
                        className: 'btn buttons-selected btn-primary',
                        action: function ( e, dt, node, config ) {
                                    console.log('Editar.Click event');
                                    var data = dt.row({selected: true}).data();  
                                    if(data){
                                        var id = data[0];
                                        var url = "{{ secure_url('grupo_atributos') }}" + "/" + id + "/edit";
                                        window.location.href = url;    
                                    }
                                                                    
                                }
                    },
                    {
                        text: 'Nuevo',
                        titleAttr: 'Nuevo',
                        className: 'new_custom btn buttons-selected btn-info',
                        action: function ( e, dt, node, config ) {
                                    console.log('Nuevo.Click event');
                                    window.location.href = "{{ secure_url('grupo_atributos/create') }}";                                    
                                }
                    }

                ],
                language: {
                    url: "{{ secure_asset('css/datagrid/datatables/spanish.json') }}"
                },
                columnDefs: [
                    {
                        "targets": [ 0 ], 
                        "visible": false,
                        "searchable": true
                    }
                ]
                    
            });               
           
            
        });
    </script>
@endsection