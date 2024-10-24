@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>

        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom_categoria">Nombre</label>
                <input type="text" class="form-control" id="nom_categoria" name="nom_categoria" value="{{ $categoria->nom_categoria }}" required>
            </div>
            <div class="form-group">
                <label for="desc_categoria">Descripción</label>
                <input type="text" class="form-control" id="desc_categoria" name="desc_categoria" value="{{ $categoria->desc_categoria }}" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
