@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Productos No Perecederos</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
        @role('admin')
            <a href="{{ route('productos_no_perecederos.create') }}" class="btn btn-success mb-3">Crear Nuevo Producto No Perecedero</a>
        @endrole
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Existencia</th>
                <th>Fecha de Expiración</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos_no_perecederos as $productoNoPerecedero)
                <tr>
                    <td>{{ $productoNoPerecedero->id_productonoperecedero }}</td>
                    <td>{{ $productoNoPerecedero->producto->nombre }}</td>
                    <td>{{ $productoNoPerecedero->existencia }}</td>
                    <td>{{ \Carbon\Carbon::parse($productoNoPerecedero->fecha_expiracion)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('productos_no_perecederos.edit', $productoNoPerecedero->id_productonoperecedero) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('productos_no_perecederos.destroy', $productoNoPerecedero->id_productonoperecedero) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto no perecedero?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
