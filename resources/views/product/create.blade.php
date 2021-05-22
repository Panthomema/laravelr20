@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alta de Producto</h1>

            <form action="/products/" method="post">
                @csrf

                <div class="form-group">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="">Precio</label>
                    <input class="form-control" type="text" name="price" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="">Tipo</label>
                    <select class="form-control" name="product_type_id">
                        @foreach($types as $type)
                        <option value="{{ $type->id }}"
                            @if(old('product_type_id') == $type->id)
                            selected
                            @endif
                            >
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Descripción</label>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">
                </div>

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @error('price')
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