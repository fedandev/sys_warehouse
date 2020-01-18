<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristicas_detalle extends Model
{
    protected $fillable = ['caracteristica_detalle_nombre', 'fk_caracteristica_id'];
    //public $timestamps = false;
    
    public function Caracteristica(){
        return $this->hasOne('App\Caracteristica', 'id', 'fk_caracteristica_id');
    }
  
    public function producto(){
        return $this->belongsToMany('App\Producto', 'caracteristica_productos');
    }
}
