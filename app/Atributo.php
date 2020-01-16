<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    protected $fillable = ['atributo_color', 'atributo_posicion', 'atributo_nombre', 'fk_grupo_atributo_id'];
    public $timestamps = true;
  
    public function Grupo_Atributo(){
        return $this->hasOne('App\Grupo_atributo', 'id', 'fk_grupo_atributo_id');
    }
  
    public function Productos(){
        return $this->belongsToMany('App\Producto_atributo', 'atributo_producto_atributo');
    }
}
