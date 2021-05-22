@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alta de Tarea</h1>

            <form action="/tasks/" method="post">
                @csrf

                <div class="form-group">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
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