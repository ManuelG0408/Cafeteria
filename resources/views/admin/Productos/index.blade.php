@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Productos</h1>
    @role('admin')
        <a href="{{ route('productos.create') }}" class="btn btn-success mb-3">Crear nuevo Producto</a>
    @endrole

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-3 mb-2">
            <div class="card h-100" style="max-width: 250px;">

                @if($producto->imagen)
                <img src="{{ asset('storage/imagenes/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nom_producto }}" style="height: 250px; object-fit: cover;">
                @else
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sin imagen" style="height: 250px; object-fit: cover;">
                @endif

                <div class="card-body p-3">
                    <h5 class="card-title">{{ $producto->nom_producto }}</h5>
                    <p class="card-text">{{ Str::limit($producto->desc_producto, 100, '...') }}</p>
                    <p class="card-text"><strong>Precio: </strong>${{ number_format($producto->precio, 2) }}</p>
                    @role('admin')
                        <p class="card-text"><strong>Categoría: </strong>{{ $producto->categoria->nom_categoria ?? 'Sin categoría' }}</p>
                    @endrole
                </div>

                @unlessrole('admin')
                    <div class="d-flex justify-content-center p-3">
                        <!-- Botón de Comprar -->
                        <form action="{{ route('carrito.agregar', $producto->id_producto) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Comprar</button>
                        </form>

                        <!-- Botón de Agregar al Carrito con margen a la izquierda -->
                        <form action="{{ route('carrito.agregar', $producto->id_producto) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary ms-3">Agregar</button>
                        </form>
                    </div>
                @endunless


                @role('admin')
                    <div class="text-center p-3">
                        <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning btn-md">Editar</a>
                        
                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-md" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                        </form>
                    </div>
                @endrole
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
