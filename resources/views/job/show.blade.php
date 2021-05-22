@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Detalle de Trabajo</h1>
            <table class="table table-striped">
                <tr>
                    <td>{{ $job->id }}</td>
                </tr>
                <tr>
                    <td>{{ $job->date->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>{{ $job->user->name }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection