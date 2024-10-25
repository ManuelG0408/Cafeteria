@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Productos</h1>
        @role('admin')
            <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear nuevo Producto</a>
        @endrole
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-4 mb-4">
            <div class="card h-100" style="max-width: 250px;">
   
                @if($producto->imagen)
                <img src="{{ url('producto/imagen/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nom_producto }}" style="height: 250px; object-fit: cover;"> <!-- Doblamos la altura de la imagen -->
                @else
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sin imagen" style="height: 250px; object-fit: cover;">
                @endif

                <div class="card-body p-3">
                    <h5 class="card-title">{{ $producto->nom_producto }}</h5>
                    <p class="card-text">{{ Str::limit($producto->desc_producto, 100, '...') }}</p>
                    <p class="card-text"><strong>Precio: </strong>${{ number_format($producto->precio, 2) }}</p>
                    <p class="card-text"><strong>Categoría: </strong>{{ $producto->categoria->nom_categoria ?? 'Sin categoría' }}</p>
                </div>

                @unlessrole('admin')
                    <div class="d-flex justify-content-center p-3">
                        <button type="submit" class="btn btn-success me-3">Comprar</button>
                        <button type="submit" class="btn btn-primary ">Agregar</button>
                    </div>
                @endunless

                @role('admin')
                    <div class="text-center p-3">
                        <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning btn-md">Editar</a>
                        
                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-md" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button> <!-- Aumentamos el tamaño del botón -->
                        </form>
                    </div>
                @endrole
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
