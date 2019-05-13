@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido al sistema de inventarios</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->hasRol('Administrador'))
    <div>Acceso como administrador</div>
@else
    <div>Acceso usuario</div>
@endif
          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
