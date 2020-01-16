<?php 
use App\Grupo_atributo;
$grupos_atributo = Grupo_atributo::get();
?>
    @if($grupos_atributo->count())
        @foreach($grupos_atributo as $grupo_atributo)
            <?php ?>
            <option value="{{$grupo_atributo->id}}">{{$grupo_atributo->grupo_atributo_nombre }}</option>
        @endforeach
    @else
         <option value="">NO HAY GRUPOS</option>
    @endif