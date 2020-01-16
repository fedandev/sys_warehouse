<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_atributo_combinacion extends Model
{
    protected $table = 'producto_atributo_combinacion';    
    protected $fillable = ['producto_atributos_id', 'atributo_id'];
    public $timestamps = true;
    
  
    public function Producto_atributo(){
        return $this->hasMany('App\Producto_atributo', 'producto_atributos_id', 'id');
    }
  
    public function Atributos(){       
        return $this->hasMany('App\Atributo', 'atributo_id', 'id');
    }
}
