@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edición de Fiesta</h1>

            <form action="/fiestas/{{ $fiesta->id }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="">Descripción</label>
                    <input class="form-control" type="text" name="description"
                    @if(old('description') == "")
                    value="{{ $fiesta->description }}">
                    @else
                    value="{{ old('description') }}">
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Límite de aforo</label>
                    <input class="form-control" type="text" name="max_people"
                    @if(old('max_people') == "")
                    value="{{ $fiesta->max_people }}">
                    @else
                    value="{{ old('max_people') }}">
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Fecha</label>
                    <input class="form-control" type="date" name="date"
                    @if(old('date') == "")
                    value="{{ $fiesta->date->format('Y-m-d') }}">
                    @else
                    value="{{ old('date') }}">
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Precio</label>
                    <input class="form-control" type="text" name="price"
                    @if(old('price') == "")
                    value="{{ $fiesta->price }}">
                    @else
                    value="{{ old('price') }}">
                    @endif
                </div>

                <div class="form-group">
                    <fieldset>
                        <label for="">
                            <input type="radio" name="private" value="1"
                            @if($fiesta->private == 1)
                            checked
                            @endif
                            > Privada
                        </label>
                        <br>
                        <label for="">
                            <input type="radio" name="private" value="0"
                            @if($fiesta->private == 0)
                            checked
                            @endif
                            > Pública
                        </label>
                    </fieldset> 
                </div>

                <div class="form-group">
                    <input class="form-control" type="submit" value="Guardar">
                </div>
            </form>


        </div>
    </div>
</div>
@endsection