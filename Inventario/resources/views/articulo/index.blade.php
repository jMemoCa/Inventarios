@extends('layouts.app')
@section('title','Crear artículo')   
   
@section('content')

@if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'articulos>crear'))
<a href="/articulos/create" class="btn btn-success">Crear</a>
@endif
<table id="tableArticulos" class="table table-hover table-condensed">
    <thead>
        <tr><th>Articulo</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Categoria</th>
            <th>Creada</th>
            <th>Modificada</th>
            <th>Opciones</th>
            
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
       
        <td>
            
            @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'articulos>editar'))

            
            <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-primary">Editar</a>
            @endif  
           
           @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'articulos>eliminar'))


                <form action="/articulos/{{$articulo->id}}" method="POST" class="form-group">
                    @method('DELETE')
                @csrf
                    <button class="btn btn-danger">Eliminar</button>
                </form>  
                @endif    
        </td>
    </tr>
 @endforeach
    </tbody>
</table>
<script>
//  $('#tableCategorias').DataTable();</script>
@endsection
