@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Detalle de Tipo de Producto</h1>
            <ul>
                <li>{{$producttype->id}}</li>
                <li>{{$producttype->name}}</li>
            </ul>
        </div>

        <div class="col-md-8">
            <h2>Productos pertenecientes</h2>
            <ul>
            @foreach($producttype->products as $product)
                <li>
                    {{ $product->name }}
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
