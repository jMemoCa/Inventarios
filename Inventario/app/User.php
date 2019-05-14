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



public function hasAccessUsuario($UserId,$accionId){
    
    if($UserId!=null){
    $roles=$this->rolsUser($UserId);
    //return $roles;
    foreach($roles as $rol) {
    
             if(Accion::select('accions.accion')->join('accion_rol', 'accions.id', '=', 'accion_rol.accion_id')->where('accion_rol.rol_id','=',$rol->id)->where('accions.accion','=',$accionId)->first()){
                return true;
             }
    }}
    abort(401, 'Esta acción no está autorizada.');



}

public function hasAccessUsuarioAccion($UserId,$accionId){
  
  if($UserId!=null){
  
    $roles=$this->rolsUser($UserId);
    //return $roles;
    foreach($roles as $rol) {
    
             if(Accion::select('accions.accion')->join('accion_rol', 'accions.id', '=', 'accion_rol.accion_id')->where('accion_rol.rol_id','=',$rol->id)->where('accions.accion','=',$accionId)->first()){
                return true;
             }
    }
}
    return false;


}




//Retorna los roles de un usuario
public function rolsUser($UserId)
{
    $posts = Rol::select('rols.id')->join('rol_user', 'rol_user.rol_id', '=', 'rols.id')
    ->where('rol_user.user_id', '=', $UserId)->get();
    

    return   $posts ;
  
}


public function accionesRol($rol,$accion)
{
    //$posts = Accion::where('accion','=',$accion)->get();
    // echo $accion;
    
    $accionReto=  Accion::select('accions.accion')->join('accion_rol', 'accions.id', '=', 'accion_rol.accion_id')->where('accion_rol.rol_id','=',$rol)->where('accions.accion','=',$accion)->first();
 
    return   $accion;
    
}

public function sesionActiva($activa){
    if($activa==false){
        abort(401, 'Esta acción no está autorizada.');
    }

}
 
}
