<div class="row">
    <div class="col-xl-9">
        <!-- Primera Columna -->
        <div class="col-md-9">
            <h2>
                Combinaciones de productos
                <span
                class="help-box"
                data-toggle="popover"
                data-content="Las combinaciones son las diferentes variaciones de un producto, con atributos como su tamaño, peso o color que toman diferentes valores. Para crear una combinación, primero debe crear los atributos de su producto. ¡Vaya a Catálogo->Atributos y características para esto!"
                >
                    ?
                </span>
            </h2>
        </div>
        <div id="attributes-generator">
            <div class="alert bg-info-400 text-white fade show" role="alert">
                <div class="d-flex align-items-center">
                    <div class="alert-icon">
                        <i class="fal fa-info-circle"></i>
                    </div>
                    <div class="flex-1">
                        Para agregar combinaciones, primero debe crear atributos y valores adecuados en Atributos y características.
Cuando termine, puede ingresar los atributos deseados (como "tamaño" o "color") y sus valores respectivos ("XS", "rojo", "todos", etc.) en el campo a continuación; o simplemente selecciónelos de la columna derecha. Luego haga clic en "Generar": ¡creará automáticamente todas las combinaciones para usted!
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10 col-lg-9">
                    <fieldset class="form-control">
                        <div id="etiquetas">
                            <!--<input type="text" class="form-control" autocomplete="off" placeholder='Combine varios atributos, por ejemplo: "Tamaño: todos", "Color: rojo".' multiple="multiple" id="" tabindex="-1" spellcheck="false" dir="auto">-->
                        </div>
                    </fieldset>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <button class="btn btn-outline-primary" id="create-combinations" type="button">
                        Generar
                    </button>
                </div>
            </div>
        </div><br>
        <!--<div id="combinations-bulk-form" class="inactive">
            <div class="row">
                <div class="col-md-12">
                    <p class="form-control bulk-action" data-toggle="collapse" href="#bulk-combinations-container" aria-expanded="false" aria-controls="bulk-combinations-container">
                        <strong>Acciones masivas (<span class="js-bulk-combinations">0</span>/<span id="js-bulk-combinations-total">0</span> combinacion(es) seleccionada)</strong>
                        <i class="material-icons float-right">keyboard_arrow_down</i>
                    </p>
                </div>
                <div class="col-md-12 collapse js-collapse" id="bulk-combinations-container">
                    <div class="border p-3">
                        <div class="row" id="bulk-combinations-container-fields">
                            <div class="col-lg-4 col-md-3 col-sm-6">
                                <label class="form-control-label">Cantidad</label>      
                                <input type="text" id="product_combination_bulk_quantity" name="product_combination_bulk[quantity]" required="required" class="form-control">  
                            </div>  
                            <div class="col-lg-4 col-md-3 col-sm-6">
                                <label class="form-control-label">Precio Costo</label>    
                                <div class="input-group money-type">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$ </span>
                                    </div>
                                    <input type="text" id="product_combination_bulk_cost_price" name="product_combination_bulk[cost_price]" data-display-price-precision="6" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6">
                                <label class="form-control-label">Impacto en el peso</label>
                                <input type="text" id="product_combination_bulk_impact_on_weight" name="product_combination_bulk[impact_on_weight]" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6">
                                <label class="form-control-label">Impacto en el precio (imp excl.)</label>    
                                <div class="input-group money-type">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$ </span>
                                    </div>
                                    <input type="text" id="product_combination_bulk_impact_on_price_te" name="product_combination_bulk[impact_on_price_te]" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6">
                                <label class="form-control-label">Impacto en el precio (imp incl.)</label>    
                                <div class="input-group money-type">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$ </span>
                                    </div>
                                    <input type="text" id="product_combination_bulk_impact_on_price_ti" name="product_combination_bulk[impact_on_price_ti]" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6">
                                <label class="form-control-label">Fecha habilitado</label>    
                                <div class="input-group datepicker">
                                    <input type="text" class="form-control" id="product_combination_bulk_date_availability" name="product_combination_bulk[date_availability]" placeholder="YYYY-MM-DD">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="material-icons">date_range</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6">
                                <label class="form-control-label">Referencia</label>    
                                <input type="text" id="product_combination_bulk_reference" name="product_combination_bulk[reference]" class="form-control">  
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6">
                                <label class="form-control-label">Cantidad mínima</label>
                                <input type="text" id="product_combination_bulk_minimal_quantity" name="product_combination_bulk[minimal_quantity]" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6">
                                <label class="form-control-label">Stock mínimo
                                    <span class="help-box" data-toggle="popover" data-content="You can increase or decrease low stock levels in bulk. You cannot disable them in bulk: you have to do it on a per-combination basis." data-original-title="" title="">?</span>
                                </label>
                                <input type="text" id="product_combination_bulk_low_stock_threshold" name="product_combination_bulk[low_stock_threshold]" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6 widget-checkbox-inline">
                                <div class="widget-checkbox-inline">
                                    <div class="checkbox">                          
                                        <label>
                                            <input type="checkbox" id="product_combination_bulk_low_stock_alert" name="product_combination_bulk[low_stock_alert]" value="1">
                                            Enviar un correo cuando el stock llegue al mínimo<span class="help-box" data-toggle="popover" data-content="The email will be sent to all the users who have the right to run the stock page. To modify the permissions, go to Advanced Parameters > Team" data-original-title="" title="">?
                                        </label>
                                    </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end mt-3">
                            <button id="delete-combinations" class="btn btn-outline-secondary mr-3" data="/prestashop/admin123/index.php/sell/catalog/products/attributes/41?_token=stZi8_eApIVm4Q5uO4h5bCpbw1SL1jBmO7JB87BYkVM">
                                <i class="material-icons">delete</i>
                                Eliminar combinacion
                            </button>
                            <button id="apply-on-combinations" class="btn btn-outline-primary mr-3">
                                Guarda
                            </button>
                            <div id="product_combination_bulk">
                                <input type="hidden" id="product_combination_bulk__token" name="product_combination_bulk[_token]" class="form-control" value="MGm5TtUI8nSs0wPDGs-cwqgDSx2I2M5-aQeHfDXN3s8">  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="combinations-list">
            <table class="table" id="tabla_combinaciones">
                <thead class="thead-default" id="combinations_thead" style="">
                    <tr>
                        <th>
                          <input type="checkbox" id="toggle-all-combinations">
                        </th>
                        <th></th>
                        <th>Combinaciones</th>
                        <th>Impacto en el precio</th>
                        <th>Precio final</th>
                        <th>Cantidad</th>
                        <th colspan="3" class="text-sm-right">Default combination</th>
                    </tr>
                </thead>
                <tbody class="js-combinations-list panel-group accordion" id="accordion_combinations" data-action-delete-all="" data-weight-unit="kg" data-action-refresh-images="" data-id-product="40" data-ids-product-attribute="" data-combinations-url="">
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xl-3">
    <!-- Segunda Columna -->
        <div id="attributes-list">
            @foreach($grupo_atributos as $grupo_atributo)
                <div class="attribute-group">
                    <a class="attribute-group-name" data-toggle="collapse" href="grupo_atributos/{{ $grupo_atributo->id }}">
                       {{ $grupo_atributo->grupo_atributo_nombre_publico }}
                    </a>
                    <div class="collapse show attributes " id="attribute-group-">
                        <div class="attributes-overflow  @if(count($grupo_atributo->Atributos) > 7) two-columns @endif">
                            @foreach($grupo_atributo->Atributos as $atributos) 
                                <div class="attribute">
                                    <input
                                      class="js-attribute-checkbox"
                                      id="attribute-{{ $atributos->id }}"
                                      data-label="{{ $grupo_atributo->grupo_atributo_nombre_publico }} : {{ $atributos->atributo_nombre }}"
                                      data-value="{{ $atributos->id }}"
                                      data-group-id="{{ $grupo_atributo->id }}"
                                      type="checkbox"
                                    >
                                    <label class="attribute-label" for="attribute-{{ $atributos->id }}">
                                      <span
                                        class="pretty-checkbox @if($atributos->atributo_color == null) not-color @endif"
                                        @if($atributos->atributo_color != null) style='background-color: {{ $atributos->atributo_color }}' @endif
                                      >
                                      </span>
                                      {{$atributos->atributo_nombre}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@section('scripts')   
<script>
    $(".js-attribute-checkbox").click(function() {
        if(this.checked){
            $("#etiquetas").prepend("<div class='token' id='Div"+$(this).attr('data-value')+"' name='etiquetas[]' data-value='"+$(this).attr('data-value')+"' data-group-id='"+$(this).attr('data-group-id')+"' style='display: inline-block; padding: 6.4px; padding: .4rem; margin: 1.6px; margin: .1rem; line-height: 1; color: #fff; text-align: center; vertical-align: baseline; background-color: #25b9d7;'>" +
                                        "<span class='token-label' style='max-width: 721.425px;'>"+
                                            $(this).attr('data-label')+
                                        "</span>"+
                                        "<a href='#' onclick=\"Borrar('"+$(this).attr('data-value')+"');\" class='close' tabindex='-1'>×</a>"+
                                    "</div>");
        }else{
            Borrar($(this).attr('data-value'))
        }
    });
    
    function Borrar(id){
        $("#Div"+id).remove();
        $("#attribute-"+id).prop("checked", false); 
    }
    
    $("#create-combinations").click(function (e) {
        e.preventDefault();
        var producto_nombre = $('#producto_nombre-field').val();
        
        if(!producto_nombre){
            alert("El nombre del producto es obligatorio")
            return;
        }
        
        var arrId = [];
        $('#etiquetas').children().each(function(){
            var ids = $(this).attr('data-value');
            arrId.push(ids);
        });
        
        /*var selected=[];
        $('#select_carac_1_detalle').each(function(){
            selected[$(this).val()]=$(this).text();
        });
        console.log(selected);
        */
        var token = $('._token').val();
        var producto_imagen = $('#producto_imagen-field').val();        
        var producto_descripcion = $('#producto_descripcion-field').val();
        var caracteristicas = $('.caracteristicas').val();
        var fk_marca_id = $('#fk_marca_id-field').val();
        var producto_cantidad = $('#producto_cantidad-field').val();
        var producto_cantidad_minima = $('#producto_cantidad_minima-field').val();
        var producto_ancho = $('#producto_ancho-field').val();
        var producto_alto = $('#producto_alto-field').val();
        var producto_profundidad = $('#producto_profundidad-field').val();
        var producto_peso = $('#producto_peso-field').val();
        var producto_condicion = $('#producto_condicion-field').val();
        var producto_precio_venta = $('#producto_precio_venta-field').val();
console.log(caracteristicas);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/productos/combinacion',
            dataType: 'json',
            data: {
                etiquetas: arrId,
                producto_nombre: producto_nombre,
                producto_descripcion: producto_descripcion,
                caracteristicas: caracteristicas
            }, 
            success: function (data) {
                console.log(data);
                
                data.forEach(function(elemento) {
                    console.log(elemento);
                    var id= 1;
                    var nombre = '';
                    if(Array.isArray(elemento)) { 
                        elemento.forEach(function(elemento2) {
                            if(nombre == ''){
                                nombre = elemento2;
                            }else{
                                nombre = nombre +  ' - '  + elemento2;        
                            }   
                        });
                    }else{
                        if(nombre == ''){
                            nombre = elemento;
                        }else{
                            nombre = nombre +  ' - '  + elemento;        
                        }        
                    }
                    
                    //agregarFila(id,nombre,0.0000,0.0000,0);
                });
            }
        });
         
     });
    
    function agregarFila(Id, Nombre, ImpactoPrecio, PrecioFinal, Cantidad ) {
   
       var htmlTags = '<tr class="combination loaded" id="combinacion_' +Id+'" data="'+Id+'" data-index="'+Id+'" style="display: table-row;">'+
            '<td width="1%"><input class="js-combination" type="checkbox" data-id="'+Id+'" data-index="'+Id+'"></td>'+
            '<td class="img"><div class="fake-img"></div></td>'+
            '<td>' + Nombre + '</td>'+
            '<td class="attribute-price">'+
                '<div class="input-group">'+
                    '<div class="input-group-prepend">'+
                        '<span class="input-group-text">$</span>'+
                    '</div>'+
                    '<input type="text" class="attribute_priceTE form-control text-sm-right" value="' + ImpactoPrecio + '">'+
                '</div>'+
            '</td>'+
           '<td class="attribute-finalprice text-sm-right">'+
                '<span data-price="0.000000" data-uniqid="'+Id+'">'+PrecioFinal+'</span> $'+
            '</td>'+
           '<td class="attribute-quantity">'+
                '<div>'+
                    '<input type="text" value="'+Cantidad+'" class="form-control text-sm-right">'+
                '</div>'+
            '</td>'+
            '<td width="5%">'+
                '<a href="" class="btn tooltip-link btn-sm delete" data="'+Id+'"><i class="material-icons">delete</i></a>'+
            '</td>'+
          '</tr>';

       $('#tabla_combinaciones tbody').append(htmlTags);

    }
</script>
@endsection
