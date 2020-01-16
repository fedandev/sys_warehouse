<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_atributo extends Model
{
    protected $fillable = ['producto_atributo_alto', 'producto_atributo_ancho', 'producto_atributo_profundidad', 'producto_atributo_peso', 'producto_atributo_default','producto_atributo_cantidad_minima', 'producto_atributo_cantidad_minima_alerta', 'fk_producto_id', 'producto_atributo_precio_impacto'];
    public $timestamps = true;
  
    public function Producto(){
        return $this->hasOne('App\Producto', 'id', 'fk_producto_id');
    }
  
    public function Atributos(){
        return $this->belongsToMany('App\Atributo', 'atributo_producto_atributo');
    }
}
