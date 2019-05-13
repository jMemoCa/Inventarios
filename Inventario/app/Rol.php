<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }

    public function accions()
    {
        return $this
            ->belongsToMany('Inventario\Accion')
            ->withTimestamps();
    }


    
public function hasAccessRol($rols,$accion)
{
    if (is_array($rols)) {
        foreach ($rols as $rol) {
            if ($this->hasAccessRolAction($rol,$accion)) {
                return true;
            }
        }
    } else {
        if ($this->hasAccessRolAction($rols,$accion)) {
            return true;
        }
    }
    return false;
}

public function rolsUser($user)
{
    $posts = Rols::join('rol_user', 'rol_user.rol_id', '=', 'rols.id')->select('rols.id', 'rols.rol')->where('rol_user.user_id', '=', $user)->get();


    return   $posts ;
    
}

public function hasAccessRolAction($rol,$accion)
{
    if ($this->rols()->where('accion', $accion)->first()) {
        return true;
    }
    return false;
}
}
