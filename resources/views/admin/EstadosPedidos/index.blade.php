@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Lista de Estados de Pedidos</h1>
    <a href="{{ route('estados_pedidos.create') }}" class="btn btn-success mb-3">Crear Estado de Pedido</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estados_pedidos as $estado)
            <tr>
                <td>{{ $estado->id_estado_pedido }}</td>
                <td>{{ $estado->desc_estado_pedido }}</td>
                <td>
                    <a href="{{ route('estados_pedidos.edit', $estado->id_estado_pedido) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('estados_pedidos.destroy', $estado->id_estado_pedido) }}" method="POST" style="display:inline-block;">
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
