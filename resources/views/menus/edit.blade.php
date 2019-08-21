@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Menus / Edit #{{$menu->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('menu_descripcion')) has-error @endif">
                       <label for="menu_descripcion-field">Menu_descripcion</label>
                    <input type="text" id="menu_descripcion-field" name="menu_descripcion" class="form-control" value="{{ is_null(old("menu_descripcion")) ? $menu->menu_descripcion : old("menu_descripcion") }}"/>
                       @if($errors->has("menu_descripcion"))
                        <span class="help-block">{{ $errors->first("menu_descripcion") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('menu_posicion')) has-error @endif">
                       <label for="menu_posicion-field">Menu_posicion</label>
                    <input type="text" id="menu_posicion-field" name="menu_posicion" class="form-control" value="{{ is_null(old("menu_posicion")) ? $menu->menu_posicion : old("menu_posicion") }}"/>
                       @if($errors->has("menu_posicion"))
                        <span class="help-block">{{ $errors->first("menu_posicion") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('menu_habilitado')) has-error @endif">
                       <label for="menu_habilitado-field">Menu_habilitado</label>
                    <input type="text" id="menu_habilitado-field" name="menu_habilitado" class="form-control" value="{{ is_null(old("menu_habilitado")) ? $menu->menu_habilitado : old("menu_habilitado") }}"/>
                       @if($errors->has("menu_habilitado"))
                        <span class="help-block">{{ $errors->first("menu_habilitado") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('menu_url')) has-error @endif">
                       <label for="menu_url-field">Menu_url</label>
                    <input type="text" id="menu_url-field" name="menu_url" class="form-control" value="{{ is_null(old("menu_url")) ? $menu->menu_url : old("menu_url") }}"/>
                       @if($errors->has("menu_url"))
                        <span class="help-block">{{ $errors->first("menu_url") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('menu_icono')) has-error @endif">
                       <label for="menu_icono-field">Menu_icono</label>
                    <input type="text" id="menu_icono-field" name="menu_icono" class="form-control" value="{{ is_null(old("menu_icono")) ? $menu->menu_icono : old("menu_icono") }}"/>
                       @if($errors->has("menu_icono"))
                        <span class="help-block">{{ $errors->first("menu_icono") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('menu_formulario')) has-error @endif">
                       <label for="menu_formulario-field">Menu_formulario</label>
                    <input type="text" id="menu_formulario-field" name="menu_formulario" class="form-control" value="{{ is_null(old("menu_formulario")) ? $menu->menu_formulario : old("menu_formulario") }}"/>
                       @if($errors->has("menu_formulario"))
                        <span class="help-block">{{ $errors->first("menu_formulario") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('menu_padre_id')) has-error @endif">
                       <label for="menu_padre_id-field">Menu_padre_id</label>
                    <input type="text" id="menu_padre_id-field" name="menu_padre_id" class="form-control" value="{{ is_null(old("menu_padre_id")) ? $menu->menu_padre_id : old("menu_padre_id") }}"/>
                       @if($errors->has("menu_padre_id"))
                        <span class="help-block">{{ $errors->first("menu_padre_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('menus.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
