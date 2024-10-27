@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Crear un Nuevo Producto No Perecedero</h1>
    <form action="{{ route('productos_no_perecederos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_producto">Selecciona el Producto<span style="color: red;">*</span></label>
            <select name="id_producto" id="id_producto" class="form-control" required>
                <option value="">Selecciona un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id_producto }}">{{ $producto->nom_producto }}</option>
                @endforeach
            </select>
            @error('id_producto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="existencia">Existencia<span style="color: red;">*</span></label>
            <input type="number" name="existencia" id="existencia" class="form-control" value="{{ old('existencia') }}" required>
            @error('existencia')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_expiracion">Fecha de Expiración<span style="color: red;">*</span></label>
            <input type="date" name="fecha_expiracion" id="fecha_expiracion" class="form-control" value="{{ old('fecha_expiracion') }}" required>
            @error('fecha_expiracion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        <a href="{{ route('productos_no_perecederos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
