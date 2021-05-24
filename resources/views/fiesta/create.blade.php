@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alta de Fiesta</h1>

            <form action="/fiestas/" method="post">
                @csrf

                <div class="form-group">
                    <label for="">Descripción</label>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">
                </div>

                <div class="form-group">
                    <label for="">Límite de aforo</label>
                    <input class="form-control" type="text" name="max_people" value="{{ old('max_people') }}">
                </div>

                <div class="form-group">
                    <label for="">Fecha</label>
                    <input class="form-control" type="date" name="date" value="{{ old('date') }}">
                </div>

                <div class="form-group">
                    <label for="">Precio</label>
                    <input class="form-control" type="text" name="price" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <fieldset>
                        <label for="">
                            <input type="radio" name="private" value="1"
                            @if(old('private') == 0)
                            checked 
                            @endif
                            > Privada
                        </label>
                        <br>
                        <label for="">
                            <input type="radio" name="private" value="0"
                            @if(old('private') == 1)
                            checked 
                            @endif
                            > Pública
                        </label>
                    </fieldset> 
                </div>

                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @error('max_people')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @error('private')
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