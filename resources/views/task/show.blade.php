@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Detalle de Tarea</h1>
            <ul>
                <li>{{ $task->id }}</li>
                <li>{{ $task->name }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
