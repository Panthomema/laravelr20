@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de Fiestas</h1>

            <a href="/fiestas/create" class="btn btn-primary">Crear nuevo</a>
            <br>
            <br>

            <table class="table table-striped">
            @foreach ($fiestas as $fiesta)
            <tr>
                <td>{{ $fiesta->id }}</td>
                <td>{{ $fiesta->description }}</td>
                <td>{{ $fiesta->max_people }}</td>
                <td>{{ $fiesta->date->format('d-m-Y') }}</td>
                <td>{{ $fiesta->price}}</td>
                <td>
                @if($fiesta->private == 1)
                    Privada
                @else
                    Pública
                @endif
                </td>
                <td>{{ $fiesta->user->name }}</td>
                <td>
                    <a class="btn btn-primary" href="/fiestas/{{$fiesta->id}}">Ver</a>
                </td>

                <td>
                    <a class="btn btn-primary" href="/fiestas/{{$fiesta->id}}/edit">Editar</a>
                </td>
                <td>
                    <form action="fiestas/{{$fiesta->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>
@endsection