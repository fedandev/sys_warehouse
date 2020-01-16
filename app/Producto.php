<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\Caracteristicas_detalle;

class Producto extends Model
{
    protected $fillable = ['producto_codigo_interno', 'producto_codigo_barras', 'producto_imagen', 'producto_nombre', 'producto_descripcion', 'producto_unidad_x_bulto', 'producto_precio_venta', 'producto_cantidad_minima', 'producto_cantidad_minima_web', 'producto_activo', 'producto_altura', 'producto_ancho', 'producto_profundidad', 'producto_peso', 'producto_condicion', 'producto_mostrar_precio', 'producto_simple', 'producto_estado', 'fk_marca_id'];
    public $timestamps = true;
  
    public function Detalle_Caracteristicas(){
        return $this->belongsToMany('App\Caracteristicas_detalle', 'caracteristica_productos');
    }
    
    public function Stock(){
        $stock = Stock::where('fk_producto_id', $this->id)->first();
        return $stock;
    }
    
    public function Producto_atributos(){
        return $this->hasMany('App\Producto_atributo','fk_producto_id','id');
    }
}