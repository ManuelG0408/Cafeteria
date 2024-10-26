@extends('layouts.dashboard')

@section('content')

@role('admin')
<div class="container">
    <h1>Crear un nuevo Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="nom_producto">Nombre del Producto<span style="color: red;">*</span></label>
            <input type="text" name="nom_producto" id="nom_producto" class="form-control" value="{{ old('nom_producto') }}">
            @error('nom_producto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="desc_producto">Descripción del Producto<span style="color: red;">*</span></label>
            <textarea name="desc_producto" id="desc_producto" class="form-control">{{ old('desc_producto') }}</textarea>
            @error('desc_producto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio">Precio<span style="color: red;">*</span></label>
            <input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio') }}">
            @error('precio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_categoria">Categoria<span style="color: red;">*</span></label>
            <select class="form-control" name="id_categoria" id="id_categoria" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $cate)
                    <option value="{{ $cate->id_categoria }}">{{ $cate->nom_categoria }}</option>
                @endforeach
            </select>
            @error('id_categoria')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del Producto<span style="color: red;">*</span></label>
            <input type="file" name="imagen" id="imagen" class="form-control">
            @error('imagen')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endrole
@endsection
