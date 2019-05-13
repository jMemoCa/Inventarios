@extends('layouts.app')

@section('content')

    
<form action="/categorias/{{$categoria->id}}" method="POST" class="form-group">
    @method('PUT')
@csrf
<div class="form-group">
        <label for="categoria">Nombre</label>
<input type="text" value="{{$categoria->categoria}}" name="categoria" class="form-control @error('categoria') is-invalid @enderror">
          
        @error('categoria')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" value="{{$categoria->descripcion}}" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror">
        
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</form>

@endsection