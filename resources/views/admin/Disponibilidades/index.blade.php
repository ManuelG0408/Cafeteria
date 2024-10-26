
@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Disponibilidades</h1>
        <a href="{{ route('disponibilidades.create') }}" class="btn btn-success">Crear Nueva Disponibilidad</a>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disponibilidades as $disponibilidad)
                    <tr>
                        <td>{{ $disponibilidad->id_disponibilidad }}</td>
                        <td>{{ $disponibilidad->desc_disponibilidad }}</td>
                        <td>
                            <a href="{{ route('disponibilidades.edit', $disponibilidad) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('disponibilidades.destroy', $disponibilidad) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
