@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de Productos</h1>

            <a href="/products/create" class="btn btn-primary">Crear nuevo</a>
            <br>
            @if(Session::has('lastProduct'))
                Último producto visitado: {{ Session::get('lastProduct')->name }}
                <br>
                <a href="/products/forgetLastProduct" class="btn btn-primary">Olvidar</a>
            @else
                Todavía no has visitado ninguno
            @endif
            <br>
            <br>

            <table class="table table-striped">
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->product_type->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a class="btn btn-primary" href="/products/{{$product->id}}">Ver</a>
                </td>

                <td>
                    <a class="btn btn-primary" href="/products/{{$product->id}}/edit">Editar</a>
                </td>
                <td>
                    <form action="products/{{$product->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
            </table>

            <hr>

            <h3>Historial de productos visitados</h3>
            @if(Session::has('history'))
                @foreach(Session::get('history') as $product)
                    <li><a href="/products/{{ $product->id }}">{{ $product->name }}</a></li>
                @endforeach
            @else
                Aún no se ha visitado ninguno.
            @endif

            <h3>Historial de productos visitados(veces)</h3>
            @if(Session::has('countedHistory'))
                <table class="table table-striped">
                @foreach(Session::get('countedHistory') as $product)
                <tr>
                    <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a> ( {{ $product->counter }})</td>
                    <td><a href="/products/{{ $product->id }}/up" class="btn btn-primary">+</a></td>
                    <td><a href="/products/{{ $product->id }}/down" class="btn btn-primary">-</a></td>
                    <td><a href="/products/{{ $product->id }}/remove" class="btn btn-danger">X</a></td>
                </tr>
                @endforeach
                </table>
            @else
                Aún no se ha visitado ninguno.
            @endif
        </div>
    </div>
</div>
@endsection
