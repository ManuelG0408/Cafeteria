@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Lista de Proveedores</h1>
    <a href="{{ route('proovedores.create') }}" class="btn btn-success">Agregar Nuevo Proveedor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Empresa</th>
                <th>RFC</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proovedores as $proovedor)
                <tr>
                    <td>{{ $proovedor->id_proovedor }}</td>
                    <td>{{ $proovedor->usuario->nombre }}</td>
                    <td>{{ $proovedor->empresa }}</td>
                    <td>{{ $proovedor->rfc }}</td>
                    <td>
                        <a href="{{ route('proovedores.edit', $proovedor->id_proovedor) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('proovedores.destroy', $proovedor->id_proovedor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
