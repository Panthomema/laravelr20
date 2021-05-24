@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Detalle de Ticket</h1>
            <ul>
                <li>{{ $ticket->id }}</li>
                <li>{{ "Fiesta de " . $ticket->fiesta->user->name }}</li>
                <li>{{ $ticket->user->name }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection