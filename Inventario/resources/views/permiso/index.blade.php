@extends('layouts.app')
@section('title','Permisos')   
   
@section('content')
@if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'permisos>crear'))
<a href="/permisos/create" class="btn btn-success">Crear</a>
@endif
<table id="tablePermisos" class="table table-hover table-condensed">
    <thead>
        <tr><th>Rol</th>
            <th>Accion</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        
         @foreach ($rolesAccion as $rolAccion)
     <tr>
         <td>
         {{$rolAccion->rol}}
        </td>
        <td>{{$rolAccion->accion}}
        <td>
                @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'permisos>editar'))
            <a href="/permisos/{{$rolAccion->rol_id}}-{{$rolAccion->accion_id}}/edit" class="btn btn-primary">Editar</a> 
           @endif
                @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'permisos>eliminar'))         
        <form action="/permisos/{{$rolAccion->rol_id}}_{{$rolAccion->accion_id}}" method="POST" class="form-group">

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
