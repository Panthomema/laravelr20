@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alta de Ticket</h1>

            <form action="/jobs/" method="post">
                @csrf

                <div class="form-group">
                    <label for="">Fiesta</label>
                    <select class="form-control" name="fiesta_id" >
                        @foreach($fiestas as $fiesta)
                        <option value="{{ $fiesta->id }}">
                            {{ $fiesta->description }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Usuario</label>
                    <select class="form-control" name="user_id" >
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input class="form-control" type="submit" value="Guardar">
                </div>
            </form>


        </div>
    </div>
</div>
@endsection