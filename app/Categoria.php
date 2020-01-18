<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['categoria_padre', 'categoria_activo', 'categoria_posicion', 'categoria_nombre', 'categoria_descripcion'];
    public $timestamps = true;
  
    public function padre(){
        $padre = Categoria::find($this->categoria_padre);
        return $padre;
    }
  
    public function tiene_hijo(){
        $hijos = Categoria::where('categoria_padre',$this->id)->get();
        if(count($hijos)>0){
          return true;
        }else{
          return false;
        }
    }
}
