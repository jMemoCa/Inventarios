<?php

namespace Inventario;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Inventario\Rol;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function rols()
    {
        return $this
            ->belongsToMany('Inventario\Rol')
            ->withTimestamps();
    }

    public function hasAccessUsuario($UserId,$accionId){
        $roles=['1'];       
        
        foreach($roles as $rol) {

            print_r($rol);
            
          $acciones=  $this->accionesRol((string)$rol,(string)$accionId);
        
            foreach($acciones as $acion){
                
                return true;
            } 
         break;          
        }
    
    abort(401, 'Esta acción no está autorizada.');
}

 
    
    public function authorizeRoles($roles)
{
    if ($this->hasAnyRol($roles)) {
        return true;
    }
    abort(401, 'Esta acción no está autorizada.');
}

public function hasAnyRol($rols)
{
    if (is_array($rols)) {
        foreach ($rols as $rol) {
            if ($this->hasRol($rol)) {
                return true;
            }
        }
    } else {
        if ($this->hasRol($rols)) {
            return true;
        }
    }
    return false;
}

public function hasRol($rol)
{
    if ($this->rols()->where('rol', $rol)->first()) {
        return true;
    }
    return false;
}

//Retorna los roles de un usuario
public function rolsUser($user)
{
    $posts = Rol::select('rols.id')->join('rol_user', 'rol_user.rol_id', '=', 'rols.id')->where('rol_user.user_id', '=', $user)->get();
    

    return   $posts ;
  
}


public function accionesRol($rol,$accion)
{
    //$posts = Accion::where('accion','=',$accion)->get();
    
    $acciones=  Accion::select('accions.accion')
                ->join('rol_accion', 'accions.id', '=', 'rol_accion.accion_id')->where('rol_accion.rol_id','=',$rol)
                ->where('accions.accion','=',$accion)
                ->get();

 
    return   $acciones ;
    
}
 
}
