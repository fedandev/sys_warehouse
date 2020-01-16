<div class="row">
    <!-- Primera Columna -->
    <div class="col-xl-10">
        <div>
            <!-- Cantidades -->
            <div class="panel-content">
                <h2>
                    Precios al por menor
                </h2>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label" for="simpleinput">Precio (imp. excl.)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">$</span>
                                </div>
                                <input class="form-control" id="precio" type="number" name="number" min="0" value="0" onkeyup="ActualizoCartel(this);" onchange="ActualizoCartel(this);"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!--<div class="panel-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="simpleinput">Regla de Impuestos</label>
                            <div class="input-group">
                                <select>
                                    <option value="null">Ninguno</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="panel-content">
                <h2>
                    Precio costo
                </h2>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label" for="simpleinput">Precio (imp. excl.)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">$</span>
                                </div>
                                <input class="form-control" id="precio_costo" type="number" name="number" min="0" value="0"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<script type="text/javascript">
    function ActualizoCartel(check){
        if(check.value > 0){
            document.getElementById('alerta').innerHTML = "Precio de venta final: <strong>$ "+ check.value +" impuestos incluidos.</strong>";
        }else{
            document.getElementById('alerta').innerHTML = "Precio de venta final: <strong>$ 0.00 impuestos incluidos.</strong>";
        }
    }
</script>