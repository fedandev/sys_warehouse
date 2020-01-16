<?php 
use App\Caracteristica;
$caracteristicas = Caracteristica::get();
?>
    @if($caracteristicas->count())
        @foreach($caracteristicas as $caracteristica)
            <?php ?>
            <option value="{{$caracteristica->id}}">{{$caracteristica->caracteristica_nombre }}</option>
        @endforeach
    @else
         <option value="">NO HAY GRUPOS DE CARACTERÍSTICAS</option>
    @endif