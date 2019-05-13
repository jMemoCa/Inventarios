<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Inventario\Categoria;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias= $categorias=Categoria::All();
        return view('categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
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
                'categoria'=>'required|max:255',
                'descripcion'=>'required|max:255'
                ]

        );

        $categoria=new categoria();
        $categoria->categoria=$request->input("categoria");
        $categoria->descripcion=$request->input("descripcion");
        $categoria->save();
         

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria= Categoria::find($id);
        return  $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria= Categoria::find($id);
        return  view('categoria.edit',compact('categoria'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'categoria'=>'required|max:255',
            'descripcion'=>'required|max:255'
            ]

    );
        $categoria->fill($request->all());
        $categoria->save();
       
        return redirect()->route('categorias.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Categoria $categoria)
    {
        $categoria->fill($request->all());
        $categoria->delete(); 
        return redirect()->route('categorias.index');
    }
}
