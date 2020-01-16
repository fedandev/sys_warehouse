<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['cliente_ruc', 'cliente_cedula', 'cliente_nombre', 'cliente_apellido', 'cliente_direccion', 'cliente_telefono1', 'cliente_telefono2', 'cliente_calle', 'fk_localidad_id'];
    public $timestamps = false;
    
    public function Localidad(){
        return $this->hasOne('App\Localidad', 'id', 'fk_localidad_id');
    }
}
