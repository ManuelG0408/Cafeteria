@extends('layouts.dashboard')

@section('content')
<p style="color: red; font-weight: bold; font-size: 36px; text-align: center; margin-top: 20%; margin-bottom: 20%;">¡No tienes permisos para crear productos!</p>
@role('admin')
<div class="container">
    <h1>Crear un nuevo Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="nom_producto">Nombre del Producto</label>
            <input type="text" name="nom_producto" id="nom_producto" class="form-control" value="{{ old('nom_producto') }}">
            @error('nom_producto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="desc_producto">Descripción del Producto</label>
            <textarea name="desc_producto" id="desc_producto" class="form-control">{{ old('desc_producto') }}</textarea>
            @error('desc_producto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio') }}">
            @error('precio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_categoria">Categoria</label>
            <select class="form-control" name="id_categoria" id="id_categoria" required>
                <option value="">Seleccione un usuario</option>
                @foreach($categorias as $cate)
                    <option value="{{ $cate->id_categoria}}">{{ $cate->nom_categoria }}</option>
                @endforeach
            </select>
            @error('id_categoria')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del Producto</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
            @error('imagen')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endrole
@endsection
