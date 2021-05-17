@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Detalle de Producto</h1>
            <table class="table table-striped">
                <tr>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <td>{{ $product->price }}</td>
                </tr>
                <tr>
                    <td>{{ $product->product_type->name }}</td>
                </tr>
                <tr>
                    <td>{{ $product->description }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection