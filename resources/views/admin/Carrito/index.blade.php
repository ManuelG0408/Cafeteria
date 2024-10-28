@extends('layouts.dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Carrito de Compras</h1>
    
    @if (session('carrito'))
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('carrito') as $id => $item)
                        <tr>
                            <td>{{ $item['nombre'] }}</td>
                            <td>{{ $item['cantidad'] }}</td>
                            <td>${{ number_format($item['precio'], 2) }}</td>
                            <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                            <td>
                                <form action="{{ route('carrito.eliminar', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center my-4">
            <h4>Total: 
                <strong>
                    ${{ number_format(collect(session('carrito'))->sum(fn($item) => $item['precio'] * $item['cantidad']), 2) }}
                </strong>
            </h4>
            <form action="{{ route('carrito.vaciar') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-warning">Vaciar Carrito</button>
            </form>
        </div>

        <!-- Formulario para realizar el pedido -->
        <form action="{{ route('pedidos.realizar') }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="comentarios" class="form-control" rows="4" placeholder="Comentarios adicionales (opcional)"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Realizar Pedido</button>
        </form>
    @else
        <div class="alert alert-info text-center" role="alert">
            No hay productos en el carrito.
        </div>
    @endif
</div>
@endsection
