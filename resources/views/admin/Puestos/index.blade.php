@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Lista de Puestos</h1>
    
    <a href="{{ route('puestos.create') }}" class="btn btn-primary">Crear nuevo Puesto</a>
    
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción del Puesto</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($puestos as $puesto)
            <tr>
                <td>{{ $puesto->id_puesto }}</td>
                <td>{{ $puesto->desc_puesto }}</td>
                <td>{{ $puesto->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

