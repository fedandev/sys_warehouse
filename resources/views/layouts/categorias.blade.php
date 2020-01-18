<?php 
use App\Categoria;
$categorias = Categoria::get();
?>
    @if($categorias->count())
        @foreach($categorias as $categoria)
            <?php ?>
            <option value="{{$categoria->id}}">{{$categoria->categoria_nombre }}</option>
        @endforeach
    @else
         <option value="">NO HAY CATEGORÍAS</option>
    @endif