@extends('layouts.dashboard')


@section('content')
<div class="container">
    <h1>Lista de Extras</h1>
    
    <a href="{{ route('extras.create') }}" class="btn btn-primary">Crear nuevo Extra</a>
    
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción del Extra</th>
                <th>Precio</th>
             
            </tr>
        </thead>
        <tbody>
            @foreach($extras as $extra)
            <tr>
                <td>{{ $extra->id_extra }}</td>
                <td>{{ $extra->desc_extra }}</td>
                <td>${{ number_format($extra->precio_extra, 2) }}</td>
             
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection