@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edición de Tipo de Producto</h1>

<<<<<<< HEAD
            <form action="/producttypes/{{$producttype->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
=======
      <form action="/producttypes/{{$producttype->id}}" method="post" class="form">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
          <label for="">Nombre</label>
          <input class="form-control" type="text" name="name" value="{{$producttype->name}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
>>>>>>> 57a61728498ed607d25a0fcbf765b0a36e0d9f96

                <div class="form-group">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{$producttype->name}}">
                </div>

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <div class="form-group">
                    <input class="form-control" type="submit" value="Guardar">
                </div>
            </form>


        </div>
    </div>
</div>
@endsection