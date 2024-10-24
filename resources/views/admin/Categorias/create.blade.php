@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Crear Nueva Categoría</h1>

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom_categoria">Nombre</label>
                <input type="text" class="form-control" id="nom_categoria" name="nom_categoria" required>
            </div>
            <div class="form-group">
                <label for="desc_categoria">Descripción</label>
                <input type="text" class="form-control" id="desc_categoria" name="desc_categoria" required>
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
