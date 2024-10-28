@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Lista de Productos Perecederos</h1>
    
    @role('admin')
    <a href="{{ route('productos_perecederos.create') }}" class="btn btn-success">Agregar Nuevo Producto Perecedero</a>
    @endrole

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mt-4">
        @foreach($productos_perecederos as $productoPerecedero)
            <div class="col-md-3 mb-2">
                <div class="card h-100" style="max-width: 250px;">
                    @if($productoPerecedero->producto->imagen)
                    <img src="{{ asset('storage/imagenes/' . $productoPerecedero->producto->imagen) }}" class="card-img-top" alt="{{ $productoPerecedero->producto->nom_producto }}" style="height: 250px; object-fit: cover;">
                    @else
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sin imagen" style="height: 250px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $productoPerecedero->producto->nom_producto }}</h5>
                        <p class="card-text">{{ $productoPerecedero->producto->desc_producto }}</p>
                        <p class="card-text"><strong>Disponibilidad:</strong> {{ $productoPerecedero->disponibilidad->desc_disponibilidad }}</p>
                        <p class="card-text"><strong>Precio:</strong> $ {{ $productoPerecedero->producto->precio }}</p>

                        @unlessrole('admin')
                            <div class="d-flex justify-content-center p-3">
                                <!-- Botón de Comprar -->
                                <form action="{{ route('carrito.agregar', $productoPerecedero->producto->id_producto) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Comprar</button>
                                </form>

                                <!-- Botón de Agregar al Carrito con margen a la izquierda -->
                                <form action="{{ route('carrito.agregar', $productoPerecedero->producto->id_producto) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary ms-3">Agregar</button>
                                </form>
                            </div>
                        @endunless

                        @role('admin')
                        <div class="text-center p-3">
                            <a href="{{ route('productos_perecederos.edit', $productoPerecedero->id_productoperecedero) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('productos_perecederos.destroy', $productoPerecedero->id_productoperecedero) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</button>
                            </form>
                        </div>  
                        @endrole
                    </div>    
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
