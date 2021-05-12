@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de Tipos de Producto</h1>

            <a href="/producttypes/create" class="btn btn-primary">Crear nuevo</a>
            <br>
            <br>

            <table class="table table-striped">
            @foreach ($producttypes as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>
                    <a class="btn btn-primary" href="/producttypes/{{$type->id}}">Ver</a>
                </td>

                <td>
                    <a class="btn btn-primary" href="/producttypes/{{$type->id}}/edit">Editar</a>
                </td>
                <td>
                    <form action="producttypes/{{$type->id}}" method="post">
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
