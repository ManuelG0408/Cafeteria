@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Lista de Puestos</h1>
    <a href="{{ route('puestos.create') }}" class="btn btn-success">Crear Nuevo Puesto</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($puestos as $puesto)
                <tr>
                    <td>{{ $puesto->id_puesto }}</td>
                    <td>{{ $puesto->desc_puesto }}</td>
                    <td>
                        <a href="{{ route('puestos.edit', $puesto->id_puesto) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('puestos.destroy', $puesto->id_puesto) }}" method="POST" style="display:inline;">
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
