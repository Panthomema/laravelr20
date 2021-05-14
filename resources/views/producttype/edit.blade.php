@extends('layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edición de Tipos de Producto</h1>

            <form action="/producttypes/{{$producttype->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{$producttype->name}}">
                </div>

                <div class="form-group">
                    <input class="form-control" type="submit" value="Guardar">
                </div>
            </form>


        </div>
    </div>
=======
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1>Editar Tipos de Producto</h1>

      <form action="/producttypes/{{$producttype->id}}" method="post" class="form">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
          <label for="">Nombre</label>
          <input class="form-control" type="text" name="name" value="{{$producttype->name}}">
        </div>

        <div class="form-group">
          <input class="form-control" type="submit" value="Guardar">
        </div>

      </form>

    </div>
  </div>
>>>>>>> 294c1e3fc9e812f98d7a71faa99f6f1a4fcb6dba
</div>
@endsection