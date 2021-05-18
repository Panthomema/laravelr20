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

        
    </div>

    <div class="col-md-8">
        @forelse($producttype->products as $product)
        <li>{{ $product->name }}</li>
        @empty
        <li>No hay ningún producto asociado</li>
        @endforelse
    </div>
  </div>
</div>
@endsection
