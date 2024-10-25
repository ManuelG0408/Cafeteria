@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Crear Producto No Perecedero</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos_no_perecederos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_producto">Producto</label>
            <select class="form-control" name="id_producto" id="id_producto" required>
                <option value="">Seleccione un producto</option>
                @foreach($productos as $prod)
                    <option value="{{ $prod->id_producto}}">{{ $prod->nom_producto }}</option>
                @endforeach
            </select>
            @error('id_producto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="existencia">Existencia</label>
            <input type="number" name="existencia" id="existencia" class="form-control" value="{{ old('existencia') }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="fecha_expiracion">Fecha de Expiración</label>
            <input type="date" name="fecha_expiracion" id="fecha_expiracion" class="form-control" value="{{ old('fecha_expiracion') }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Crear</button>
        <a href="{{ route('productos_no_perecederos.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>
@endsection
