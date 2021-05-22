@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de Trabajos</h1>

            <a href="/jobs/create" class="btn btn-primary">Crear nuevo</a>
            <br>
            <br>

            <table class="table table-striped">
            @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->date->format('d-m-Y') }}</td>
                <td>{{ $job->user->name }}</td>
                <td>
                    <a class="btn btn-primary" href="/jobs/{{$job->id}}">Ver</a>
                </td>

                <td>
                    <a class="btn btn-primary" href="/jobs/{{$job->id}}/edit">Editar</a>
                </td>
                <td>
                    <form action="jobs/{{$job->id}}" method="post">
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