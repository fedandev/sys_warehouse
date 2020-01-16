<?php 
use App\Localidad;
$localidades = Localidad::get();
?>
    @if($localidades->count())
        @foreach($localidades as $localidad)
            <?php ?>
            <option value="{{$localidad->id}}">{{$localidad->localidad_nombre - $localidad->provincia->provincia_nombre - $localidad->provincia->pais->pais_nombre}}</option>
        @endforeach
    @else
         <option value="">NO HAY LOCALIDADES</option>
    @endif