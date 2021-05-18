@extends('layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de Productos</h1>

            <a href="/products/create" class="btn btn-primary">Crear nuevo</a>
            <br>
            <br>

            <table class="table table-striped">
            @foreach ($products as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>{{ $type->price }}</td>
                <td>{{ $type->product_type->name }}</td>
                <td>{{ $type->description }}</td>
                <td>
                    <a class="btn btn-primary" href="/products/{{$type->id}}">Ver</a>
                </td>

                <td>
                    <a class="btn btn-primary" href="/products/{{$type->id}}/edit">Editar</a>
                </td>
                <td>
                    <form action="products/{{$type->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
=======
  <div class="row justify-content-center">
    <div class="col-md-8">
      <img src="/images/laravel.svg" alt="">
      <h1>Lista de Producto</h1>

      <a href="/products/create" class="btn btn-primary">Crear nuevo</a>
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
    </div>
  </div>
</div>
@endsection
>>>>>>> 57a61728498ed607d25a0fcbf765b0a36e0d9f96
