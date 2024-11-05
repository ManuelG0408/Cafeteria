@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Detalles del Pedido </h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id Pedido</th>
                <th>Descripción Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $detalle)
                <tr>
                    <td>{{ $detalle->pedido->id_pedido }}</td>
                    <td>{{ $detalle->producto->desc_producto }}</td> 
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Volver a la lista de pedidos</a>
</div>
@endsection
