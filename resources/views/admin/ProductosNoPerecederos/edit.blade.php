@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Editar Producto No Perecedero</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos_no_perecederos.update', $productoNoPerecedero->id_productonoperecedero) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_producto">Producto<span style="color: red;">*</span></label>
            <input type="text" name="id_producto" id="id_producto" class="form-control" value="{{ $productoNoPerecedero->id_producto }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="existencia">Existencia<span style="color: red;">*</span></label>
            <input type="number" name="existencia" id="existencia" class="form-control" value="{{ $productoNoPerecedero->existencia }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="fecha_expiracion">Fecha de Expiración<span style="color: red;">*</span></label>
            <input type="date" name="fecha_expiracion" id="fecha_expiracion" class="form-control" value="{{ $productoNoPerecedero->fecha_expiracion }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
        <a href="{{ route('productos_no_perecederos.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>
@endsection
