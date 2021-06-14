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
                    @can('view', $product)
                    <a class="btn btn-primary" href="/products/{{$product->id}}">Ver</a>            
                    @endcan
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

<<<<<<< HEAD
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
=======
      <h3>Historial de productos visitados</h3>
      @if(Session::has('historial'))
        @foreach(Session::get('historial') as $key => $product)
        <li>
          <a href="/products/{{$product->id}}">{{$product->name}}</a>
          -
          <a href="/products/{{$key}}/removeHistorial">Borrar {{$key}}</a>
      
        </li>
        @endforeach
      @else
          Aún no hay ninguno en la lista
      @endif

      <h3>Historial de productos visitados con contador</h3>
      @if(Session::has('historial2'))
        <table class="table table-striped">          
          @foreach(Session::get('historial2') as $product)
          <tr>
          <td><a href="/products/{{$product->id}}">{{$product->name}}</a> ({{$product->contador}})</td>
          <td><a href="/products/{{$product->id}}/up" class="btn btn-primary btn-xs">+</a></td>
          <td><a href="/products/{{$product->id}}/down" class="btn btn-primary btn-xs">-</a></td>
          <td><a href="/products/{{$product->id}}111/remove" class="btn btn-danger btn-xs">x</a></td>
          </tr>
          @endforeach
        </table>
      @else
          Aún no hay ninguno en la lista
      @endif
>>>>>>> 8b8d03b8375e49d0e0337905de27359788f325b3
    </div>
</div>
@endsection
