@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Detalle de Tipos de Producto</h1>
            <ul>
                <li>{{$producttype->id}}</li>
                <li>{{$producttype->name}}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
