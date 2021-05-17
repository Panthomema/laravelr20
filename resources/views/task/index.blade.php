@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de Tareas</h1>

            <a href="/tasks/create" class="btn btn-primary">Crear nuevo</a>
            <br>
            <br>

            <table class="table table-striped">
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task-> id }}</td>
                <td>{{ $task-> name }}</td>
                <td>
                    <a class="btn btn-primary" href="/tasks/{{$task->id}}">Ver</a>
                </td>

                <td>
                    <a class="btn btn-primary" href="/tasks/{{$task->id}}/edit">Editar</a>
                </td>
                <td>
                    <form action="tasks/{{$task->id}}" method="post">
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