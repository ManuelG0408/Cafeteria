@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Editar Producto No Perecedero</h1>
    <form action="{{ route('productos_no_perecederos.update', $productoNoPerecedero->id_productonoperecedero) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_producto">Selecciona el Producto<span style="color: red;">*</span></label>
            <select name="id_producto" id="id_producto" class="form-control" required>
                <option value="">Selecciona un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id_producto }}" {{ $productoNoPerecedero->id_producto == $producto->id_producto ? 'selected' : '' }}>
                        {{ $producto->desc_producto }}
                    </option>
                @endforeach
            </select>
            @error('id_producto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="existencia">Existencia<span style="color: red;">*</span></label>
            <input type="number" name="existencia" id="existencia" class="form-control" value="{{ old('existencia', $productoNoPerecedero->existencia) }}" required>
            @error('existencia')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_expiracion">Fecha de Expiración<span style="color: red;">*</span></label>
            <input type="date" name="fecha_expiracion" id="fecha_expiracion" class="form-control" value="{{ old('fecha_expiracion', $productoNoPerecedero->fecha_expiracion) }}" required>
            @error('fecha_expiracion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('productos_no_perecederos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
