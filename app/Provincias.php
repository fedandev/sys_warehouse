<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    protected $fillable = ['provincia_nombre', 'fk_pais_id'];
    public $timestamps = false;
    
    public function Pais(){
        return $this->hasOne('App\Pais', 'id', 'fk_pais_id');
    }
    
    public function Localidades(){
        return $this->hasMany('App\Localidad','fk_provincia_id','id');
    } 
}
