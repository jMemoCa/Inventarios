<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Inventario\Rol;
use Illuminate\Support\Facades\Auth;
use Inventario\User;
use Inventario\Accion;
class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->hasAccessUsuario(Auth::user()!=null?Auth::user()->id:null ,'permisos>consultar'); 
        $rol=new Rol();
        $rolesAccion=$rol-> rol_accion();
       // return  $rolesAccion;

        return view('permiso.index',compact('rolesAccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Auth::user()->hasAccessUsuario(Auth::user()!=null?Auth::user()->id:null ,'permisos>eliminar'); 
      
        
        $ids=explode('_',$id,2);
 
        $accion= new Accion();
       $accion->quitarPermiso($ids[0],$ids[1]);
       return redirect()->route('permisos.index');

    }
}
