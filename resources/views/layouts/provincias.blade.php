<?php 
use App\Provincias;
$provincias = Provincias::get();
?>
    @if($provincias->count())
        @foreach($provincias as $provincia)
            <?php ?>
            <option value="{{$provincia->id}}">{{$provincia->pais_nombre - $provincia->pais->pais_nombre}}</option>
        @endforeach
    @else
         <option value="">NO HAY PROVINCIAS</option>
    @endif