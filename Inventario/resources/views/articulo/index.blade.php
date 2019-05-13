@extends('layouts.app')
@section('title','Crear artículo')   
   
@section('content')

<a href="/articulos/create" class="btn btn-success">Crear</a>
<table id="tableArticulos" class="table table-hover table-condensed">
    <thead>
        <tr><th>Articulo</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Categoria</th>
            <th>Creada</th>
            <th>Modificada</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        
         @foreach ($articulos as $articulo)
     <tr>
         <td>
         {{$articulo->articulo}}
        </td>
        <td>{{$articulo->descripcion}}</td>
        <td>{{$articulo->cantidad}}</td>
        <td>{{$articulo->categoriaId}}</td>
        <td>{{$articulo->created_at}}</td>
        <td>{{$articulo->updated_at}}</td>
       
        <td><a href="/articulos/{{$articulo->id}}/edit" class="btn btn-primary">Editar</a></td>
        <td>            
                <form action="/articulos/{{$articulo->id}}" method="POST" class="form-group">
                    @method('DELETE')
                @csrf
                    <button class="btn btn-danger">Eliminar</button>
                </form>       
        </td>
    </tr>
 @endforeach
    </tbody>
</table>
<script>
//  $('#tableCategorias').DataTable();</script>
@endsection
