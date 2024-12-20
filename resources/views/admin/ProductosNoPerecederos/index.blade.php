@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Lista de Productos No Perecederos</h1>

    @role('admin')
        <a href="{{ route('productos_no_perecederos.create') }}" class="btn btn-success">Agregar Nuevo Producto No Perecedero</a>
    @endrole

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mt-4">
        @foreach($productosNoPerecederos as $productoNoPerecedero)
            <div class="col-md-3 mb-2">
                <div class="card h-100" style="max-width: 250px;">
                    @if($productoNoPerecedero->producto->imagen)
                    <img src="{{ asset('storage/imagenes/' . $productoNoPerecedero->producto->imagen) }}" class="card-img-top" alt="{{ $productoNoPerecedero->producto->nom_producto }}" style="height: 250px; object-fit: cover;">
                    @else
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sin imagen" style="height: 250px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">Producto: {{ $productoNoPerecedero->producto->nom_producto }}</h5>
                        <p class="card-text">{{ $productoNoPerecedero->producto->desc_producto }}</p>
                        <p class="card-text"><strong>Precio:</strong> $ {{ $productoNoPerecedero->producto->precio }}</p>
                        @role('admin')
                            <p class="card-text"><strong>Existencia:</strong> {{ $productoNoPerecedero->existencia }}</p>
                            <p class="card-text"><strong>Fecha de Expiración:</strong> {{ $productoNoPerecedero->fecha_expiracion }}</p>
                        @endrole

                        @unlessrole('admin')
                            <div class="d-flex justify-content-center p-3">
                                <!-- Botón de Comprar -->
                                <form action="{{ route('carrito.agregar', $productoNoPerecedero->producto->id_producto) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Comprar</button>
                                </form>

                                <!-- Botón de Agregar al Carrito con margen a la izquierda -->
                                <form action="{{ route('carrito.agregar', $productoNoPerecedero->producto->id_producto) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary ms-3">Agregar</button>
                                </form>
                            </div>
                        @endunless

                        @role('admin')
                        <div class="text-center p-3">
                            <a href="{{ route('productos_no_perecederos.edit', $productoNoPerecedero->id_productonoperecedero) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('productos_no_perecederos.destroy', $productoNoPerecedero->id_productonoperecedero) }}" method="POST" style="display:inline;">
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
