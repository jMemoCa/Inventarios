@extends('layouts.app')
@section('title','Crear artículo')   
   
@section('content')
@if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'categorias>crear'))
<a href="/categorias/create" class="btn btn-success">Crear</a>
@endif
<table id="tableCategorias" class="table table-hover table-condensed">
    <thead>
        <tr><th>Categoria</th>
            <th>Descripción</th>
            <th>Creada</th>
            <th>Modificada</th>
             
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        
         @foreach ($categorias as $categoria)
     <tr>
         <td>
         {{$categoria->categoria}}
        </td>
        <td>{{$categoria->descripcion}}</td>
        <td>{{$categoria->created_at}}</td>
        <td>{{$categoria->updated_at}}</td>
        <td>
                @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'categorias>editar'))
            <a href="/categorias/{{$categoria->id}}/edit" class="btn btn-primary">Editar</a> 
           @endif
                @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'categorias>eliminar'))         
                <form action="/categorias/{{$categoria->id}}" method="POST" class="form-group">

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
