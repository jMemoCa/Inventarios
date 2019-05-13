<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inventario\Articulo;
use Inventario\User;
use Inventario\Rol;
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       
      //  return  Auth::user()-> rolsUser(Auth::user()->id);
     
      //  return Auth::user()->hasAccessUsuario(Auth::user()->id ,'articulos>index');
       //funcion Auth::user()->tieneAcceso('categorias.index');
       
        // if(Auth::user()->rolId=="1"){
        //    return Auth::user()->rolId;
        // }
         

         $articulos=Articulo::All();
        return view('articulo.index',compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         

         return view('articulo.create');
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([
                'articulo'=>'required|max:255',
                'descripcion'=>'required|max:255',
                'cantidad'=>'integer',
                'categoriaId'=>'integer',
                ]

        );

        $articulo=new articulo();
        $articulo->articulo=$request->input("articulo");
        $articulo->descripcion=$request->input("descripcion");
        $articulo->cantidad=$request->input("cantidad");
        $articulo->categoriaId=$request->input("categoriaId");
        $articulo->save();
         

        return redirect()->route('articulos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo= Articulo::find($id);
        return  $articulo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo= Articulo::find($id);
        return  view('articulo.edit',compact('articulo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'articulo'=>'required|max:255',
            'descripcion'=>'required|max:255'
            ]

    );
        $categoria->fill($request->all());
        $categoria->save();
       
        return redirect()->route('articulos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Articulo $articulo)
    {
        $articulo->fill($request->all());
        $articulo->delete(); 
        return redirect()->route('articulos.index');
    }
}
