@extends('layouts.app')

@section('content')

    
<form action="/articulos" method="POST" class="form-group">
@csrf
<div class="form-group">
        <label for="articulo">Artículo</label>
        <input type="text" name="articulo" class="form-control @error('articulo') is-invalid @enderror">
          
        @error('articulo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror">
        
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number"  name="cantidad" class="form-control @error('cantidad') is-invalid @enderror">
            
            @error('cantidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group">
                <label for="categoriaId">Categoria</label>
                <input type="text" name="categoriaId" class="form-control @error('categoriaId') is-invalid @enderror">
                
                @error('categoriaId')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a class="btn btn-secondary" type="submit" href="/articulos">Cancelar</a>
    </div>

</form>

@endsection