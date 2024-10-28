@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Detalles de Pedidos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Detalle</th>
                <th>ID Pedido</th>
                <th>ID Producto</th>
                <th>Descripción Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $detalle)
                <tr>
                    <td>{{ $detalle->id_detalle_pedido }}</td>
                    <td>{{ $detalle->pedido->id_pedido }}</td> <!-- Muestra el ID del pedido -->
                    <td>{{ $detalle->producto->id_producto }}</td> <!-- Muestra el ID del producto -->
                    <td>{{ $detalle->producto->desc_producto }}</td> <!-- Descripción del producto -->
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->subtotal }}</td>
                    <td>
                        <a href="{{ route('detalles_pedidos.edit', $detalle->id_detalle_pedido) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('detalles_pedidos.destroy', $detalle->id_detalle_pedido) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este detalle de pedido?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
