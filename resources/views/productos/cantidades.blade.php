<div class="row">
    <!-- Primera Columna -->
    <div class="col-xl-10">
        <div>
            <!-- Cantidades -->
            <div class="panel-content">
                <h2>
                    Cantidades
                </h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="cantidad">Cantidad</label>
                            <input class="form-control" id="cantidad" type="number" name="number" value="0">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="cantidad_min">Cantidad mínima para vender</label>
                            <input class="form-control" id="cantidad_min" type="number" name="number" value="0">
                        </div>
                    </div>
                </div>
            </div> 
            <div class="panel-content">
                <h2>
                    Stock
                </h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="localizacion">Localizacion </label>
                            <input class="form-control" id="localizacion" type="text" name="number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="stock_min">Stock Mínimo </label>
                            <input class="form-control" id="stock_min" type="number" name="number">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <br><br>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked2">
                            <label class="custom-control-label" for="defaultUnchecked"> Notificarme cuando la cantidad sea inferior o igual a este nivel.</label><button type="button"                                                                                                                                                                   class="help-box" 
                                                                                                                                                                    data-toggle="popover" 
                                                                                                                                                                    data-trigger="focus" 
                                                                                                                                                                    data-placement="top" 
                                                                                                                                                                    title="" 
                                                                                                                                                                    data-content="Notificación via correo electrónico. El correo electrónico se enviará a todos los usuarios que tengan derecho a ejecutar la página de inventario. Para modificar los permisos, vaya a Configuración Avanzada." 
                                                                                                                                                                    data-original-title="" 
                                                                                                                                                                    data-template='<div class="popover bg-info-400 border-info" role="tooltip"><div class="arrow"></div><h4 class="popover-header bg-transparent"></h4><div class="popover-body text-white"></div></div>'>
                                                                                                                                                                    ?</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<style>
.help-box {
    display: inline-block;
    box-sizing: border-box;
    color: #ffffff;
    background-color: #886ab5;
    height: 16px;
    height: 1rem;
    width: 16px;
    width: 1rem;
    font-weight: 700;
    font-size: 10px;
    line-height: 12px;
    vertical-align: middle;
    text-align: center;
    border: 1px solid #25b9d7;
    cursor: pointer;
    padding: 0;
    margin: 0 5px 2px;
</style>