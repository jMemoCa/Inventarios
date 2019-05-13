<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    public function rols()
    {
        return $this
            ->belongsToMany('App\Rol')
            ->withTimestamps();
    }

    
}
