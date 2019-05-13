<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable=['articulo','descripcion','cantidad','categoridaId'];
}
