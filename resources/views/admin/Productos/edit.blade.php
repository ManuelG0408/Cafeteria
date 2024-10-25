@extends('layouts.dashboard')

@section('content')
@unlessrole('admin')
<p style="color: red; font-weight: bold; font-size: 36px; text-align: center; margin-top: 20%; margin-bottom: 20%;">¡No tienes permisos para crear productos!</p>
@endunlessrole
@role('admin')
<div class="container mt-5 mb-5">
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom_producto" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nom_producto" name="nom_producto" value="{{ old('nom_producto', $producto->nom_producto) }}" required>
            @error('nom_producto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="desc_producto" class="form-label">Descripción del Producto</label>
            <textarea class="form-control" id="desc_producto" name="desc_producto" required>{{ old('desc_producto', $producto->desc_producto) }}</textarea>
            @error('desc_producto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required step="0.01" min="0">
            @error('precio')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}" {{ $producto->id_categoria == $categoria->id_categoria ? 'selected' : '' }}>
                        {{ $categoria->nom_categoria }}
                    </option>
                @endforeach
            </select>
            @error('id_categoria')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del Producto</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
            <small class="form-text text-muted">La imagen actual es: {{ $producto->imagen }}</small>
            @error('imagen')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endrole
@endsection
