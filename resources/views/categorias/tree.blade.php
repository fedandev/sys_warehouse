<li data-value="{{ $categoria['categoria_id'] }}">{{ $categoria['categoria_nombre'] }}</li>
@if (count($categoria['children']) > 0)   
    <ul>
    @foreach($categoria['children'] as $categoria)
        @include('categorias.tree', $categoria)         
    @endforeach
    </ul>
@endif