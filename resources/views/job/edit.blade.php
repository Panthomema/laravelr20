@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edición de Trabajo</h1>

            <form action="/jobs/{{$job->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="">Fecha (Mes-Día-Año)</label>
                    <input class="form-control" type="date" name="date"
                    @if(old('date') == "") 
                    value="{{ $job->date->format('Y-m-d') }}">
                    @else
                    value="{{ old('date') }}"
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Usuario</label>
                    <select name="user_id" class="form-control">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}"
                            @if(old('user_id') == $user->id)
                            selected
                            @elseif($user->id == $job->user_id)
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