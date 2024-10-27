@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Editar Producto Perecedero</h1>
    <form action="{{ route('productos_perecederos.update', $productoPerecedero->id_productoperecedero) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_producto">Selecciona el Producto<span style="color: red;">*</span></label>
            <select name="id_producto" id="id_producto" class="form-control" required>
                <option value="">Selecciona un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id_producto }}" {{ $productoPerecedero->id_producto == $producto->id_producto ? 'selected' : '' }}>
                        {{ $producto->desc_producto }}
                    </option>
                @endforeach
            </select>
            @error('id_producto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_disponibilidad">Disponibilidad<span style="color: red;">*</span></label>
            <select name="id_disponibilidad" id="id_disponibilidad" class="form-control">
                @foreach($disponibilidades as $disponibilidad)
                    <option value="{{ $disponibilidad->id_disponibilidad }}" {{ $productoPerecedero->id_disponibilidad == $disponibilidad->id_disponibilidad ? 'selected' : '' }}>
                        {{ $disponibilidad->desc_disponibilidad }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('productos_perecederos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
