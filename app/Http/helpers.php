<?php
//ARCHIVO PARA REUTILIZACION DE FUNCIONES PARA USO EN FRONT
use Illuminate\Support\Str;
use App\Ajuste;
use App\Menu;
use Carbon\Carbon;

function isActiveRoute($route, $output = 'active'){   
    $ruta_actual = Route::getCurrentRoute()->uri();
   
    if ( $ruta_actual == $route) {
        return $output;
    }
}

function isClassLogin($class){
    if (auth()) {
        return ''; 
    }else{
        return $class;
    }
}

function routeIndex($controller){
    $url = str_before($controller,'Controller');
    return Str::lower($url);
}

function controllerFromRoute(){
    $route = Route::currentRouteName();
    $pos = strpos($route, '.');
    
    if($pos != 0){
        $controller = substr($route, 0, $pos);
    }else{
        $controller = $route;
    }
    return $controller;
}

function cacheQuery($sql, $timeout = 60) {
    $key = md5($sql);
    if(Cache::has($key)){
         $content = Cache::get($key);
         return $content;
    }
    
    return Cache::remember($key, $timeout, function() use ($sql) {
        return DB::select(DB::raw($sql));
    });
}
 
//$cache = $this->cacheQuery("SOME COMPLEX JOINS ETC..", 30);

function getMenusUser(){
    $menus = cacheQuery("select * from menus where menu_habilitado=1 and id in (select fk_menu_id from modulos_menus where fk_modulo_id in (select fk_modulo_id from perfiles_modulos where fk_perfil_id in (select fk_perfil_id from perfiles_usuarios where fk_user_id = ". auth()->user()->id . " )))", 30);
    return $menus;
}

function getMenusUser2(){
    $menus = DB::select('select * from menus where menu_habilitado=1 and id in (select fk_menu_id from modulos_menus where fk_modulo_id in (select fk_modulo_id from perfiles_modulos where fk_perfil_id in (select fk_perfil_id from perfiles_usuarios where fk_user_id = :id_user)))', ['id_user' =>auth()->user()->id]);									

    return $menus;
}

function ajuste($valor){
    $ajuste = Ajuste::where('ajuste_nombre','=',$valor)->first();
    if ($ajuste){
        return $ajuste->ajuste_valor;
    }else{
        return null;
    }
    
}

function debug_to_console( $data ) {
    if (ajuste('debug') =='S'){
        $output = $data;
        if ( is_array( $output ) ){
            $output = implode( ',', $output);
        }
        echo "<script>console.log( 'Debug: " . $output . "' );</script>";
    }
}

function menuHabilitado( $controller, $permiso ) {
    $menu = cacheQuery("SELECT * FROM menus WHERE menu_formulario = '". $controller . "'");
    //$menu = DB::select("SELECT * FROM menus WHERE menu_formulario = '". $controller . "'");
    if(count($menu) > 0){
        
        $menu_id = $menu[0]->id;
        debug_to_console('menuid:'. $menu_id);
      
        $permiso = DB::select('select * from permisos where id= :id_permiso and id in 
                                (select permiso_id from  perfiles_permisos where perfil_id in 
			                        (select fk_perfil_id from perfiles_modulos where fk_modulo_id in	
						                (select fk_modulo_id from modulos_menus where fk_menu_id = :menu_id) 
						                and fk_perfil_id in (select fk_perfil_id from perfiles_usuarios where fk_user_id =:id_user)))',
						                ['id_user' =>auth()->user()->id, ':id_permiso'=>$permiso, 'menu_id' => $menu_id]
						      );
	    if ($permiso){
	        return true;
	    }
    }
    return false;
}    

function formatHora( $datetime, $format_hora ) {
    $hora = strtotime($datetime);
    $hora = date($format_hora, $hora);
    return  $hora;
}

function formatFecha( $date , $format_fecha = null) {
    $fecha = strtotime($date);
    if(!$format_fecha){
        $format_fecha=ajuste('date_format');
    }
    $fecha = date($format_fecha, $fecha);
    return  $fecha;
}

function diff_horas($hora_inicio, $hora_fin){
    $diff_seconds  = $horaFin - $horaInicio;
    $diff_weeks    = floor($diff_seconds/604800);
    $diff_seconds -= $diff_weeks   * 604800;
    $diff_days     = floor($diff_seconds/86400);
    $diff_seconds -= $diff_days    * 86400;
    $diff_hours    = floor($diff_seconds/3600);
    $diff_seconds -= $diff_hours   * 3600;
    $diff_minutes  = floor($diff_seconds/60);
    $diff_seconds -= $diff_minutes * 60;
}

function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
	// Cálculo de la distancia en grados
	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
 
	// Conversión de la distancia en grados a la unidad escogida (kilómetros, millas o millas naúticas)
	switch($unit) {
		case 'km':
			$distance = $degrees * 111.13384; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735 km)
			break;
		case 'mi':
			$distance = $degrees * 69.05482; // 1 grado = 69.05482 millas, basándose en el diametro promedio de la Tierra (7.913,1 millas)
			break;
		case 'nmi':
			$distance =  $degrees * 59.97662; // 1 grado = 59.97662 millas naúticas, basándose en el diametro promedio de la Tierra (6,876.3 millas naúticas)
	}
	return round($distance, $decimals);
}






