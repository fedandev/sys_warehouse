@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" media="screen, print" href="{{ secure_asset('css/datagrid/datatables/datatables.bundle.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2> Categorías</h2>
                </div>
                <div class="panel-hdr">
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="demo-v-spacing">
                                <ol class="breadcrumb bg-primary-300">
                                  <li class="breadcrumb-item">
                                      <a href="{{ secure_url('categorias') }}" class="text-white">
                                          <i class="fal fa-home mr-1"></i> Inicio
                                      </a>
                                  </li>
                                  @php
                                    if(isset($cat_seleccionada)){
                                      $arrays= array();
                                      array_push($arrays, array('nombre' => $cat_seleccionada->categoria_nombre, 'id' => $cat_seleccionada->id));
                                      $padre = $cat_seleccionada->padre();
                                      if(!is_null($padre)){
                                        while($padre->categoria_padre != 0){
                                          array_push($arrays, array('nombre' => $padre->categoria_nombre, 'id' => $padre->id));
                                          $padre = $padre->padre();
                                        }
                                        if($padre->categoria_padre == 0){
                                          array_push($arrays, array('nombre' => $padre->categoria_nombre, 'id' => $padre->id));
                                        }
                                        $reversivo = array_reverse($arrays);
                                        
                                        foreach($reversivo as $rev){
                                  
                                    @endphp
                                          <li class="breadcrumb-item">
                                              <a href="{!! $rev['id'] !!}" class="text-white">{{ $rev['nombre'] }}</a>
                                          </li>
                                    @php    
                                        }
                                      }else{
                                        @endphp
                                        <li class="breadcrumb-item">
                                            <a href="@php $cat_seleccionada->id @endphp" class="text-white">{{ $cat_seleccionada->categoria_nombre }}</a>
                                        </li>
                                        @php
                                      }
                                  }
                                  @endphp
                                </ol>
                            </div>
                        </div>
                    </div>
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
                                            <th>Descripción</th>
                                            <th>Posición</th>
                                            <th>Activo/Baja</th>
                                            <th>Hijos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categorias as $categoria)
                                          @php 
                                              if($categoria->categoria_padre >0){
                                                  $categoria_padre = $categoria->padre();
                                              }else{
                                                  $categoria_padre = null;
                                              }
                                          @endphp
                                        <tr>
                                            <td>{{ $categoria->id }} </td>
                                            <td>{{ $categoria->categoria_nombre }}</td>
                                            <td>{{ $categoria->categoria_descripcion }}</td>
                                            <td>{{ $categoria->categoria_posicion }}</td>
                                            @if ($categoria->categoria_activo == 1)
                                                <td>Activo</td>
                                            @else
                                                <td>Baja</td>
                                            @endif
                                            @if ($categoria->tiene_hijo())
                                          <td><a href="{{ secure_url('categorias/subs', $categoria->id ) }}"><i class="fal fa-search"></i> Ver subcategorías</a></td>
                                            @else
                                                <td> </td>
                                            @endif
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
    <script src="{{ secure_asset('js/datagrid/datatables/datatables.export.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {

            $('#dt_table thead tr').clone(true).appendTo('#dt_table thead');
                $('#dt_table thead tr:eq(1) th').each(function(i)
                {
                    var title = $(this).text();
                    $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Buscar por ' + title + '" />');

                    $('input', this).on('keyup change', function()
                    {
                        if (table.column(i).search() !== this.value)
                        {
                            table
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });
                });

                var table = $('#dt_table').DataTable(
                {
                    responsive: true,
                    orderCellsTop: true,
                    fixedHeader: true,
                    select: { style: 'multiple' },
                  dom:                       
                      "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  buttons: [
                      {
                          text: '<i class="fal fa-times mr-1"></i> Borrar',
                          titleAttr: 'Borrar',
                          className: 'btn-primary btn-sm mr-1',
                          action: function ( e, dt, node, config ) {
                                      console.log('Borrar.Click event');                            
                                      var data = dt.row({selected: true}).data();   
                                      if(data){
                                          var id = data[0];
                                          var url = "{{ secure_url('categorias') }}";
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
                          text: '<i class="fal fa-edit mr-1"></i> Editar',
                          titleAttr: 'Editar',
                          className: 'btn-primary btn-sm mr-1',
                          action: function ( e, dt, node, config ) {
                                      console.log('Editar.Click event');
                                      var data = dt.row({selected: true}).data();  
                                      if(data){
                                          var id = data[0];
                                          var url = "{{ secure_url('categorias') }}" + "/" + id + "/edit";
                                          window.location.href = url;    
                                      }

                                  }
                      },
                      {
                          text: '<i class="fal fa-plus mr-1"></i> Nuevo',
                          titleAttr: 'Nuevo',
                          className: 'btn-success btn-sm mr-1',
                          action: function ( e, dt, node, config ) {
                                      console.log('Nuevo.Click event');
                                      window.location.href = "{{ secure_url('categorias/create') }}";                                    
                                  }
                      },
                      {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            titleAttr: 'Generar PDF',
                            className: 'btn-outline-danger btn-sm mr-1'
                        },
                      {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            titleAttr: 'Generar Excel',
                            className: 'btn-outline-success btn-sm mr-1'
                        },
                        /*{
                            extend: 'print',
                            text: '<i class="fal fa-print"></i>',
                            titleAttr: 'Imprimir Tabla',
                            className: 'btn-outline-default'
                        }*/
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