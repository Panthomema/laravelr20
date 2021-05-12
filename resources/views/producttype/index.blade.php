@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de Tipos de Producto</h1>

            <table class="table table-striped">
            @foreach ($producttypes as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
            </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
