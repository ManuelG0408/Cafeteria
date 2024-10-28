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
                <th>ID Detalle Pedido</th>
                <th>ID Pedido</th>
                <th>ID Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles_pedidos as $detalle)
                <tr>
                    <td>{{ $detalle->id_detalle_pedido }}</td>
                    <td>{{ $detalle->id_pedido }}</td>
                    <td>{{ $detalle->id_producto }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ number_format($detalle->subtotal, 2) }}</td>
                    <td>
                        <a href="{{ route('detalles_pedidos.edit', $detalle->id_detalle_pedido) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('detalles_pedidos.destroy', $detalle->id_detalle_pedido) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este detalle de pedido?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
