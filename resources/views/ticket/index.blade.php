@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de Tickets</h1>

            <a href="/tickets/create" class="btn btn-primary">Crear nuevo</a>
            <br>
            <br>

            <table class="table table-striped">
            @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ "Fiesta de " . $ticket->fiesta->user->name }}</td>
                <td>{{ $ticket->user->name }}</td>
                <td>
                    <a class="btn btn-primary" href="/tickets/{{$ticket->id}}">Ver</a>
                </td>

                <td>
                    <form action="tickets/{{$ticket->id}}" method="post">
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