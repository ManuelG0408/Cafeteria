@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Lista de Tipos de Clientes</h1>
    <a href="{{ route('tipos_clientes.create') }}" class="btn btn-success">Crear Nuevo Tipo de Cliente</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipos_clientes as $tipoCliente)
                <tr>
                    <td>{{ $tipoCliente->id_tipo_cliente }}</td>
                    <td>{{ $tipoCliente->desc_tipo_cliente }}</td>
                    <td>
                        <a href="{{ route('tipos_clientes.edit', $tipoCliente->id_tipo_cliente) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('tipos_clientes.destroy', $tipoCliente->id_tipo_cliente) }}" method="POST" style="display:inline;">
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
