@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Editar Estado de Pedido</h1>
    <form action="{{ route('estados_pedidos.update', $estadoPedido->id_estado_pedido) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="desc_estado_pedido">Descripción<span style="color: red;">*</span></label>
            <input type="text" name="desc_estado_pedido" class="form-control" value="{{ $estadoPedido->desc_estado_pedido }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('estados_pedidos.index') }}" class="btn btn-secondary">Cancelar</a> <!-- Botón Cancelar -->
    </form>
</div>
@endsection
