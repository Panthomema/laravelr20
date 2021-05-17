@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edición de Producto</h1>

            <form action="/products/{{$product->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{$product->name}}">
                </div>

                <div class="form-group">
                    <label for="">Precio</label>
                    <input class="form-control" type="text" name="price" value="{{$product->price}}">
                </div>

                <div class="form-group">
                    <label for="">Tipo</label>
                    <select class="form-control" name="product_type_id">
                        @foreach($types as $type)
                        <option value="{{ $type->id }}"
                            @if($type->id == $product->product_type_id)
                            selected
                            @endif
                            >{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Descripción</label>
                    <input class="form-control" type="text" name="description" value="{{$product->description}}">
                </div>


                <div class="form-group">
                    <input class="form-control" type="submit" value="Guardar">
                </div>
            </form>


        </div>
    </div>
</div>
@endsection