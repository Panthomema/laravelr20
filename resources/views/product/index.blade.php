@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <img src="/images/laravel.svg" alt="">
      <h1>Lista de Producto</h1>

      <a href="/products/create" class="btn btn-primary">Crear nuevo</a>
      <br>
      @if(Session::has('lastProduct'))
        El último producto visitado es: {{Session::get('lastProduct')->name }}
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
          <td>{{ $product->description }}</td>
          <td>{{ $product->price }}</td>
          <td>{{ $product->producttype->name }}</td>
          <td>{{ $product->product_type->name }}</td>
          <td>
            <a class="btn btn-primary" href="/products/{{$product->id}}">Ver</a>            
          </td>
          <td>
            <a class="btn btn-primary" href="/products/{{$product->id}}/edit">Editar</a>            
          </td>
          <td>
            <form action="/products/{{$product->id}}" method="post">
              @csrf
              <input product="hidden" name="_method" value="DELETE">
              <input product="submit" class="btn btn-danger" value="Borrar">
            </form>
          </td>
      </tr>
      @endforeach
      </table>

      <hr>

      <h3>Historial de productos visitados</h3>
      @if(Session::has('historial'))
        @foreach(Session::get('historial') as $product)
        <li><a href="/products/{{$product->id}}">{{$product->name}}</a></li>
        @endforeach
      @else
          Aún no hay ninguno en la lista
      @endif

      <h3>Historial de productos visitados con contador</h3>
      @if(Session::has('historial2'))
        @foreach(Session::get('historial2') as $product)
          <li><a href="/products/{{$product->id}}">{{$product->name}}</a> ({{$product->contador}})</li>
        @endforeach
      @else
          Aún no hay ninguno en la lista
      @endif
    </div>
  </div>
</div>
@endsection
