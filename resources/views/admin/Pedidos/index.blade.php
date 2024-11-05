@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Pedidos</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    @role('cliente')
        <a href="{{ route('pedidos.create') }}" class="btn btn-success">Crear Nuevo Pedido</a>
    @endrole
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
                    <td>{{ $pedido->cliente->usuario->nombre }} {{ $pedido->cliente->usuario->apellido_paterno }} {{ $pedido->cliente->usuario->apellido_materno }}</td>
                    <td>{{ $pedido->estadoPedido->desc_estado_pedido }}</td>
                    <td>{{ $pedido->total }}</td>
                    <td>{{ $pedido->comentarios }}</td>
                    <td>
                    @role('admin')
                        <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" class="btn btn-warning">Editar</a>
                    @endrole

                    @role('empleado')
                        <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" class="btn btn-warning">Editar</a>
                    @endrole

                    <a href="{{ route('pedidos.detalles', $pedido->id_pedido) }}" class="btn btn-info">Detalles</a>


                    @role('admin')
                        <form action="{{ route('pedidos.destroy', $pedido->id_pedido) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @endrole
                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
