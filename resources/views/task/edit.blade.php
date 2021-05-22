@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edición de Tarea</h1>

            <form action="/tasks/{{$task->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="name"
                    @if(old('name') == "")
                    value="{{ $task->name }}">
                    @else 
                    value="{{old('name')}}">
                    @endif
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