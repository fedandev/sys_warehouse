<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    protected $fillable = ['ajuste_nombre', 'ajuste_valor', 'ajuste_descripcion'];
    public $timestamps = false;
}
