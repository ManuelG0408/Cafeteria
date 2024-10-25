@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Pedidos</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <a href="{{ route('pedidos.create') }}" class="btn btn-success">Crear Nuevo Pedido</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Pedido</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Comentarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id_pedido }}</td>
                    <td>{{ $pedido->fecha_pedido }}</td>
                    <td>{{ $pedido->cliente->nombre }} {{ $pedido->cliente->apellido_paterno }}</td>
                    <td>{{ $pedido->estadoPedido->nombre }}</td>
                    <td>{{ $pedido->total }}</td>
                    <td>{{ $pedido->comentarios }}</td>
                    <td>
                        <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('pedidos.destroy', $pedido->id_pedido) }}" method="POST" style="display:inline;">
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
