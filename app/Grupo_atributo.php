<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo_atributo extends Model
{
    protected $fillable = ['grupo_atributo_nombre', 'grupo_atributo_nombre_publico'];
    public $timestamps = true;
    
    public function Atributos(){
        return $this->hasMany('App\Atributo','fk_grupo_atributo_id','id');
    }
}
