@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Editar Producto Perecedero</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos_perecederos.update', $productoPerecedero->id_productoperecedero) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_producto">Producto</label>
            <input type="text" name="id_producto" id="id_producto" class="form-control" value="{{ $productoPerecedero->id_producto }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="id_disponibilidad">Disponibilidad</label>
            <input type="text" name="id_disponibilidad" id="id_disponibilidad" class="form-control" value="{{ $productoPerecedero->id_disponibilidad }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
        <a href="{{ route('productos_perecederos.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>
@endsection
