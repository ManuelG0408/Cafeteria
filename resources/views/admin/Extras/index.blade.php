@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Lista de Extras</h1>
    <a href="{{ route('extras.create') }}" class="btn btn-success">Agregar Nuevo Extra</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($extras as $extra)
                <tr>
                    <td>{{ $extra->id_extra }}</td>
                    <td>{{ $extra->desc_extra }}</td>
                    <td>{{ $extra->precio_extra }}</td>
                    <td>
                        <a href="{{ route('extras.edit', $extra->id_extra) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('extras.destroy', $extra->id_extra) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este extra?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
