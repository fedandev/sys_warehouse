@extends('layout')
@section('header')
<div class="page-header">
        <h1>Menus / Show #{{$menu->id}}</h1>
        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('menus.edit', $menu->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="menu_descripcion">MENU_DESCRIPCION</label>
                     <p class="form-control-static">{{$menu->menu_descripcion}}</p>
                </div>
                    <div class="form-group">
                     <label for="menu_posicion">MENU_POSICION</label>
                     <p class="form-control-static">{{$menu->menu_posicion}}</p>
                </div>
                    <div class="form-group">
                     <label for="menu_habilitado">MENU_HABILITADO</label>
                     <p class="form-control-static">{{$menu->menu_habilitado}}</p>
                </div>
                    <div class="form-group">
                     <label for="menu_url">MENU_URL</label>
                     <p class="form-control-static">{{$menu->menu_url}}</p>
                </div>
                    <div class="form-group">
                     <label for="menu_icono">MENU_ICONO</label>
                     <p class="form-control-static">{{$menu->menu_icono}}</p>
                </div>
                    <div class="form-group">
                     <label for="menu_formulario">MENU_FORMULARIO</label>
                     <p class="form-control-static">{{$menu->menu_formulario}}</p>
                </div>
                    <div class="form-group">
                     <label for="menu_padre_id">MENU_PADRE_ID</label>
                     <p class="form-control-static">{{$menu->menu_padre_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('menus.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection