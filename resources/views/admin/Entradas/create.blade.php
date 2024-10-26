@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Crear Nueva Entrada</h1>

    <form action="{{ route('entradas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_proovedor" class="form-label">Proveedor<span style="color: red;">*</span></label>
            <select class="form-select" id="id_proovedor" name="id_proovedor" required>
                <option value="">Seleccionar Proveedor</option>
                @foreach($proovedores as $proveedor)
                    <option value="{{ $proveedor->id_proovedor }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_producto" class="form-label">Producto<span style="color: red;">*</span></label>
            <select class="form-select" id="id_producto" name="id_producto" required>
                <option value="">Seleccionar Producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id_producto }}">{{ $producto->nom_producto }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad<span style="color: red;">*</span></label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required min="1">
        </div>

        <div class="mb-3">
            <label for="precio_compra" class="form-label">Precio de Compra<span style="color: red;">*</span></label>
            <input type="number" class="form-control" id="precio_compra" name="precio_compra" required step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label for="fecha_entrada" class="form-label">Fecha de Entrada<span style="color: red;">*</span></label>
            <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Entrada</button>
        <a href="{{ route('entradas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
