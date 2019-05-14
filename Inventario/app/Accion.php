<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    public function rols()
    {
        return $this
            ->belongsToMany('Inventario\Rol')
            ->withTimestamps();
    }

    public function quitarPermiso($idRol,$idAccion){
        $rol = Accion::find($idAccion); //La materia en la se inscribió;
        $rol->rols()->detach($idRol); //Eliminamos la relacion con ese alumno.
    
    }
    
}
