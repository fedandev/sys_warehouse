<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $fillable = ['caracteristica_nombre'];
    //public $timestamps = false;
    
    public function Caracteristica_Detalles(){
        return $this->hasMany('App\Caracteristicas_detalle', 'fk_caracteristica_id');
    }
}
