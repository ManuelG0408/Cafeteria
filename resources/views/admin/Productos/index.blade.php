@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>
    
    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear nuevo Producto</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Acciones</th> <!-- Nueva columna de acciones -->
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id_producto }}</td>
                <td>{{ $producto->nom_producto }}</td>
                <td>{{ $producto->desc_producto }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->categoria->nom_categoria ?? 'Sin categoría' }}</td>
                <td>
                    @if($producto->imagen)
                        <img src="{{ asset('storage/imagenes/' . $producto->imagen) }}" alt="{{ $producto->nom_producto }}" width="50">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>
                    
                    <!-- Botón Editar -->
                    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning btn-sm">Editar</a>
                    
                    <!-- Botón Eliminar -->
                    <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
