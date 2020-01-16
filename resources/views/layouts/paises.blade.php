<?php 
use App\Pais;
$paises = Pais::get();
?>
    @if($paises->count())
        @foreach($paises as $pais)
            <?php ?>
            <option value="{{$pais->id}}">{{$pais->pais_nombre}}</option>
        @endforeach
    @else
         <option value="">NO HAY PAISES</option>
    @endif