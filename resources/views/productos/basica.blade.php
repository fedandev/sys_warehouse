<div class="row">
    <div class="col-xl-8">
        <!-- Primera Columna -->
        <div id="fileUpload" class="dropzone">
            <div class="dz-default dz-message">
                <i class="fal fa-cloud-upload text-muted mb-3"></i> <br>
                <span class="text-uppercase">Suelte los archivos aquí o haga clic para cargar.</span>
                <br>
            </div>
        </div>
        <div class="panel-content">
            <div class="form-group">
                <label class="form-label" for="simpleinput">Nombre</label>
                <input class="form-control" type="text" name="producto_nombre" id="producto_nombre-field" placeholder="Ingrese el nombre del producto" required>
            </div>
        </div> 
        <div class="panel-content">
            <div class="form-group">
                <label class="form-label" for="simpleinput">Descripción</label>
                <textarea class="form-control" rows="5" name="producto_descripcion" id="producto_descripcion-field" placeholder="Ingrese una descripción del producto" required=""></textarea>
            </div>
        </div> 
        <div>
            <!-- Caracteristicas -->
            <div class="panel-content">
                <div class="form-group">
                    <h1>Características</h1>
                    <br>
                    <div id="Caracteristicas">
                        
                    </div>
                    <button type="button" class="btn btn-primary waves-effect waves-themed" onclick="AgregarCaracteristicas();" style="margin-top:1em"><i class="fal fa-plus-circle"></i> Agregar Característica</button>
                </div>
            </div>
        </div>
        <div>
            <!-- Marcas -->
            <div class="panel-content">
                <div class="form-group">
                    <div id="Marcas">
                        <button type="button" id='btnMarcas' class="btn btn-primary waves-effect waves-themed" onclick="AgregarMarca();" style="margin-top:1em"><i class="fal fa-plus-circle"></i> Agregar Marca</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
    <!-- Segunda Columna -->
        <div class="frame-wrap">
            <h2>Tipos de Producto</h2>
            <div class="frame-wrap">
                <div class="demo">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="simple" name="defaultRadios" onclick="show(combinado);" checked="">
                        <label class="custom-control-label" for="simple">Producto simple</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="combinado" name="defaultRadios" onclick="show('combinado');">
                        <label class="custom-control-label" for="combinado">Producto combinado</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="virtual" name="defaultRadios" onclick="show(combinado);">
                        <label class="custom-control-label" for="virtual">Producto virtual</label>
                        <!-- Se quita pestaña de envio -->
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="pack" name="defaultRadios">
                        <label class="custom-control-label" for="pack">Pack de productos</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="frame-wrap">
            <h2>Categorías</h2>
            <div id="treeview-checkbox-demo">                                            
                <ul>
                    @each('categorias.tree', $categorias, 'categoria')
                </ul>
            </div>
         </div>
    </div>
</div>