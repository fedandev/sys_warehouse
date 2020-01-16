<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu_padre_id', 'menu_descripcion', 'menu_posicion', 'menu_habilitado', 'menu_url', 'menu_icono', 'menu_formulario'];
    public $timestamps = false;
    
//     public function Modulos()
//     {
//         return $this->belongsToMany('App\Models\Modulo', 'modulos_menus', 'fk_menu_id', 'fk_modulo_id');
//     }
    
    

    
    public function padre(){
        $padre = Menu::find($this->menu_padre_id);
        return $padre;
    }
}
