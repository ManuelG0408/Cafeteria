@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Editar Pedido #{{ $pedido->id_pedido }}</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <form action="{{ route('pedidos.update', $pedido->id_pedido) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fecha_pedido">Fecha Pedido:</label>
            <input type="datetime-local" name="fecha_pedido" id="fecha_pedido" class="form-control" value="{{ $pedido->fecha_pedido->format('Y-m-d\TH:i') }}" required readonly>
        </div>
        
        <div class="form-group">
            <label for="id_cliente">Cliente:</label>
            <select name="id_cliente" id="id_cliente" class="form-control" required disabled>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ $pedido->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                        {{ $cliente->usuario->nombre }} {{ $cliente->usuario->apellido_paterno }} {{ $cliente->usuario->apellido_materno }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_estado_pedido">Estado:</label>
            <select name="id_estado_pedido" id="id_estado_pedido" class="form-control" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado->id_estado_pedido }}" {{ $pedido->id_estado_pedido == $estado->id_estado_pedido ? 'selected' : '' }}>
                        {{ $estado->desc_estado_pedido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="number" name="total" id="total" class="form-control" value="{{ $pedido->total }}" required readonly>
        </div>

        <div class="form-group">
            <label for="comentarios">Comentarios:</label>
            <textarea name="comentarios" id="comentarios" class="form-control" rows="3" readonly>{{ $pedido->comentarios }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Estado</button>
        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
