<script type="text/javascript">
    var incremento = 0;
    
    function AgregarCaracteristicas(){
        incremento++;

        //Obteniendo el Div "caracteristicas"
        bloque = document.getElementById('Caracteristicas');
         
        var newDiv = document.createElement("div"); 
        newDiv.setAttribute("class", "input-group");
        if(incremento > 1){
            newDiv.setAttribute("style", "margin-top:1em;");
        }
        newDiv.id = 'div'+incremento;
        
        //Creando el Select que irá dentro del Div "caracteristicas"
        select_caract = document.createElement('select');
        select_caract.setAttribute("class", "custom-select" );
        select_caract.setAttribute("style", "margin-right:2em;");
        select_caract.setAttribute("onChange","CargarDetalles(this)");
        select_caract.id = 'select_carac_'+incremento;
        newDiv.appendChild(select_caract);

        $.get(`../../ListaCaracteristicas/`, function(res, sta){
            if(res.length>=0){
                $("#"+select_caract.id).append('<option selected="selected"> Seleccione una característica.</option>');
                res.forEach(element => {
                    $("#"+select_caract.id).append(`<option value=${element.id}> ${element.caracteristica_nombre} </option>`);
                });
            }
        });
        
        select_sub_carac = document.createElement('select');
        select_sub_carac.setAttribute("class", "custom-select");
        select_sub_carac.id = 'select_carac_'+incremento+'_detalle';
        select_sub_carac.setAttribute("name", "caracteristicas[]");
        select_sub_carac.disabled=true;
        
        var option = document.createElement("option");
        option.text = "Seleccione una característica"
        
        select_sub_carac.add(option);
        newDiv.appendChild(select_sub_carac);
        
        //Creo el boton al lado del select
        var DivButton = document.createElement("div");
        DivButton.setAttribute("class", "input-group-append");
        
        borrarElemento = document.createElement('input');
        borrarElemento.id = 'borrar'+incremento;
        borrarElemento.type = "button";
        borrarElemento.setAttribute("class", "btn btn-outline-default");
        borrarElemento.setAttribute('onclick', "Eliminar("+incremento+");");
        borrarElemento.value = "Borrar"
        
        DivButton.appendChild(borrarElemento);
        newDiv.appendChild(DivButton);
        
        bloque.appendChild(newDiv);
    }
    
    function AgregarMarca(){
        //Obteniendo el Div "caracteristicas"
        bloque = document.getElementById('Marcas');
        
        //Elimino boton existente
        //$( "#btnMarcas" ).remove();
        $("#btnMarcas").hide();
        
        var DivTitulo = document.createElement("div"); 
        DivTitulo.id = "DivTitulo";
        
        var tituloDiv = document.createElement("h1"); 
        tituloDiv.innerHTML = "Marca";
        
        DivTitulo.appendChild(tituloDiv);
        
        bloque.appendChild(DivTitulo);
        
        var newDiv = document.createElement("div"); 
        newDiv.setAttribute("class", "input-group");
        newDiv.setAttribute("style", "margin-top:1em;");
        newDiv.id = 'div_marca';
        
        //Creando el Select que irá dentro del Div "caracteristicas"
        select_marca = document.createElement('select');
        select_marca.setAttribute("class", "custom-select" );
        select_marca.setAttribute("name", "fk_marca_id");
        select_marca.setAttribute("style", "margin-right:2em;");
        select_marca.id = 'fk_marca_id-field';
        newDiv.appendChild(select_marca);

        $.get(`../../ListaMarcas/`, function(res, sta){
            if(res.length>=0){
                $("#"+select_marca.id).append('<option selected="selected"> Seleccione una marca.</option>');
                res.forEach(element => {
                    $("#"+select_marca.id).append(`<option value=${element.id}> ${element.marca_nombre} </option>`);
                });
            }
        });
        
        //Creo el boton al lado del select
        var DivButton = document.createElement("div");
        DivButton.setAttribute("class", "input-group-append");
        
        borrarElemento = document.createElement('input');
        borrarElemento.id = 'borrarMarca';
        borrarElemento.type = "button";
        borrarElemento.setAttribute("class", "btn btn-outline-default");
        borrarElemento.setAttribute('onclick', "EliminarMarca();");
        borrarElemento.value = "Borrar"
        
        DivButton.appendChild(borrarElemento);
        newDiv.appendChild(DivButton);
        
        bloque.appendChild(newDiv);
    }
    
    function CargarDetalles(sel){
        $.get(`../../detalle_caracteristica/${sel.value}`, function(res, sta){
            $('#'+sel.id+'_detalle').empty();
            if(res.length>=0){
                $('#'+sel.id+'_detalle').append('<option> Seleccione una opción.</option>');
                res.forEach(element => {
                    $('#'+sel.id+'_detalle').append(`<option value=${element.id}> ${element.caracteristica_detalle_nombre} </option>`);
                });
            }
        });
        $('#'+sel.id+'_detalle').removeAttr('disabled');
    }
    
    function EliminarMarca(){
        //Pido confirmacion para eliminar Div de Select de caracteristicas
        bootbox.confirm(
        {
            message: "Esta seguro que desea eliminar esta marca?",
            buttons:
            {
                confirm:
                {
                    label: 'Si',
                    className: 'btn-success'
                },
                cancel:
                {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function(result)
            {
                if(result){
                    $( "#div_marca" ).remove();
                    $('#DivTitulo').remove();
                    $("#btnMarcas").show();
                }
            }
        });
    }
    
    function Eliminar(id){
        //Pido confirmacion para eliminar Div de Select de caracteristicas
        bootbox.confirm(
        {
            message: "Esta seguro que desea eliminar esta descripción?",
            buttons:
            {
                confirm:
                {
                    label: 'Si',
                    className: 'btn-success'
                },
                cancel:
                {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function(result)
            {
                if(result){
                    $( "#div"+id ).remove();   
                }
            }
        });
    }

    function show(nombre){
        if(nombre == "combinado"){
            document.getElementById('cantidades').style.display = 'none';
            document.getElementById('combinaciones').style.display = 'inline';
            document.getElementById('envio').style.display = 'inline';
        }else if(nombre == "virtual"){
            document.getElementById('cantidades').style.display = 'inline';
            document.getElementById('combinaciones').style.display = 'none';
            document.getElementById('envio').style.display = 'inline';
        }else{
            document.getElementById('cantidades').style.display = 'inline';
            document.getElementById('combinaciones').style.display = 'none';
            document.getElementById('envio').style.display = 'inline';
        }
    }
</script>