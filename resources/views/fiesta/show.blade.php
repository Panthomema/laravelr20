@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Detalle de Fiesta</h1>
            <ul>
                <li>{{ $fiesta->id }}</li>
                <li>{{ $fiesta->description }}</li>
                <li>{{ $fiesta->max_people }}</li>
                <li>{{ $fiesta->date->format('d-m-Y') }}</li>
                <li>{{ $fiesta->price }}</li>
                <li>
                @if($fiesta->private == 1)
                    Privada
                @else
                    Pública
                @endif
                </li>
                <li>{{ $fiesta->user->name }}</li>
            </ul>
        </div>

        <div class="col-md-8">
        @forelse($fiesta->tickets as $ticket)
            <li>{{ $ticket->user->name }}</li>
        @empty
            <li>No se ha expedido ningún ticket</li>
        @endforelse
        </div>
    </div>
</div>
@endsection