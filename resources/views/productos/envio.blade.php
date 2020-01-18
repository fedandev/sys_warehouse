<div class="row">
    <!-- Primera Columna -->
    <div class="col-xl-10">
        <div>
            <!-- Cantidades -->
            <div class="panel-content">
                <h2>
                    Dimensiones del paquete
                </h2>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label" for="ancho">Ancho</label>
                            <div class="input-group">
                                <input class="form-control" id="ancho" type="number" name="number" value="0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label" for="altura">Altura</label>
                            <div class="input-group">
                                <input class="form-control" id="altura" type="number" name="number" value="0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label" for="profundidad">Profundidad</label>
                            <div class="input-group">
                                <input class="form-control" id="profundidad" type="number" name="number" value="0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label" for="peso">Peso</label>
                            <div class="input-group">
                                <input class="form-control" id="peso" type="number" name="number" value="0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="panel-content">
                <h2>
                    Tiempo de Entrega
                </h2>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="defaultUncheckedRadio" name="defaultExampleRadios" onclick="habilitaTiempoEntrega('ninguno');">
                    <label class="custom-control-label" for="defaultUncheckedRadio"> Ninguno</label>
                </div>
                <br>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="defaultCheckedRadio" name="defaultExampleRadios" checked="" onclick="habilitaTiempoEntrega('default');">
                    <label class="custom-control-label" for="defaultCheckedRadio"> Default</label>
                    <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                            <button type="button"                                                                                                                                                                   class="help-box" 
                                    data-toggle="popover" 
                                    data-trigger="focus" 
                                    data-placement="top" 
                                    title="" 
                                    data-content="Notificación via correo electrónico. El correo electrónico se enviará a todos los usuarios que tengan derecho a ejecutar la página de inventario. Para modificar los permisos, vaya a Configuración Avanzada." 
                                    data-original-title="" 
                                    data-template='<div class="popover bg-info-400 border-info" role="tooltip"><div class="arrow"></div><h4 class="popover-header bg-transparent"></h4><div class="popover-body text-white"></div></div>'>
                                    ?</button>
                        </div>
                </div><br>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input active" id="defaultUncheckedRadio2" name="defaultExampleRadios" onclick="habilitaTiempoEntrega('personalizado');">
                    <label class="custom-control-label" for="defaultUncheckedRadio2"> Tiempo específico para este producto</label>
                </div>
                <br>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="tiempopersonalizado">Tiempo de entrega de productos</label>
                        <input class="form-control" id="tiempopersonalizado" type="number" name="number" placeholder="Envio en 3-4 días" disabled>
                    </div>
                </div>
            </div>
            <div class="panel-content">
                <h2>
                    Gastos de envío
                </h2>
                <label class="form-label" for="gastos_envio">¿Este producto tiene costos de envío adicionales?</label>
                <div class="col-lg-3">
                    <div class="input-group">
                        <input class="form-control" id="gastos_envio" type="number" name="number" value="0">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">$ (URU)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function habilitaTiempoEntrega(check){
    if(check == "personalizado"){
        if(document.getElementById('tiempopersonalizado').disabled == true){
            document.getElementById('tiempopersonalizado').disabled=false;
        }
    }else{
        if(document.getElementById('tiempopersonalizado').disabled == false){
            document.getElementById('tiempopersonalizado').disabled=true;
        }
    }
}
</script>