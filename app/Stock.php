<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['fk_producto_atributo_id', 'fk_producto_id', 'fk_sucursal_id', 'stock_cantidad'];
    public $timestamps = true;
  
    public function Producto_Atributo(){
        return $this->hasOne('App\Producto_atributo', 'id', 'fk_producto_atributo_id');
    }
  
    public function Producto(){
        return $this->hasOne('App\Producto', 'id', 'fk_producto_id');
    }
  
    public function Sucursal(){
        return $this->hasOne('App\Sucursal', 'id', 'fk_sucursal_id');
    }
}
