@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Crear Nuevo Pedido</h1>

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="fecha_pedido" class="form-label">Fecha del Pedido</label>
            <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" required>
        </div>

        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select class="form-select" id="id_cliente" name="id_cliente" required>
                <option value="">Seleccionar Cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_estado_pedido" class="form-label">Estado del Pedido</label>
            <select class="form-select" id="id_estado_pedido" name="id_estado_pedido" required>
                <option value="">Seleccionar Estado</option>
                @foreach($estados_pedidos as $estado)
                    <option value="{{ $estado->id_estado_pedido }}">{{ $estado->desc_estado_pedido }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios</label>
            <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear Pedido</button>
        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
