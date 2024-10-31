@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Entradas</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <a href="{{ route('entradas.create') }}" class="btn btn-success">Crear Nueva Entrada</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio de Compra</th>
                <th>Fecha de Entrada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entradas as $entrada)
                <tr>
                    <td>{{ $entrada->id_entrada }}</td>
                    <td>
                        {{ $entrada->proveedores ? $entrada->proveedores->usuario->nombre . ' ' . $entrada->proveedores->usuario->apellido_paterno . ' ' . $entrada->proveedores->usuario->apellido_materno : 'Proveedor no disponible' }}
                    </td>
                    <td>{{ $entrada->producto->nom_producto }}</td>
                    <td>{{ $entrada->cantidad }}</td>
                    <td>{{ $entrada->precio_compra }}</td>
                    <td>{{ $entrada->fecha_entrada }}</td>
                    <td>
                        <a href="{{ route('entradas.edit', $entrada->id_entrada) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('entradas.destroy', $entrada->id_entrada) }}" method="POST" style="display:inline;">
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
