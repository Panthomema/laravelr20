@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alta de Trabajo</h1>

            <form action="/jobs/" method="post">
                @csrf

                <div class="form-group">
                    <label for="">Fecha (Mes-día-Año)</label>
                    <input class="form-control" type="date" name="date" value="{{ old('date')}}">
                </div>

                <div class="form-group">
                    <label for="">Usuario</label>
                    <select class="form-control" name="user_id">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}"
                            @if(old('user_id') == $user->id)
                            selected
                            @endif
                            >
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                @error('date')
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