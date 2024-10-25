@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Productos Perecederos</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
        @role('admin')
            <a href="{{ route('productos_perecederos.create') }}" class="btn btn-success mb-3">Crear Nuevo Producto Perecedero</a>
        @endrole
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Disponibilidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos_perecederos as $productoPerecedero)
                <tr>
                    <td>{{ $productoPerecedero->id_productoperecedero }}</td>
                    <td>{{ $productoPerecedero->producto->nombre }}</td>
                    <td>{{ $productoPerecedero->disponibilidad->estado }}</td>
                    <td>
                        <a href="{{ route('productos_perecederos.edit', $productoPerecedero->id_productoperecedero) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('productos_perecederos.destroy', $productoPerecedero->id_productoperecedero) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto perecedero?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
