@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Editar Entrada</h1>

    <form action="{{ route('entradas.update', $entrada->id_entrada) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_proovedor" class="form-label">Proveedor</label>
            <select class="form-select" id="id_proovedor" name="id_proovedor" required>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id_proovedor }}" {{ $entrada->id_proovedor == $proveedor->id_proovedor ? 'selected' : '' }}>
                        {{ $proveedor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_producto" class="form-label">Producto</label>
            <select class="form-select" id="id_producto" name="id_producto" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id_producto }}" {{ $entrada->id_producto == $producto->id_producto ? 'selected' : '' }}>
                        {{ $producto->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $entrada->cantidad }}" required min="1">
        </div>

        <div class="mb-3">
            <label for="precio_compra" class="form-label">Precio de Compra</label>
            <input type="number" class="form-control" id="precio_compra" name="precio_compra" value="{{ $entrada->precio_compra }}" required step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
            <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" value="{{ $entrada->fecha_entrada }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Entrada</button>
        <a href="{{ route('entradas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
