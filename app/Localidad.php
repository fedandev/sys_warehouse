<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $fillable = ['localidad_nombre', 'fk_provincia_id'];
    public $timestamps = false;
    
    public function Provincia(){
        return $this->hasOne('App\Provincias', 'id', 'fk_provincia_id');
    }
}
