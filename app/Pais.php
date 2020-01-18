<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = ['pais_nombre'];
    public $timestamps = false;
    
    public function Provincias(){
        return $this->hasMany('App\Provincias','fk_provincia_id','id');
    }
}
