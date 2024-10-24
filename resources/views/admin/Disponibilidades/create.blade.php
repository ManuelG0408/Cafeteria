@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Crear Nueva Disponibilidad</h1>

        <form action="{{ route('disponibilidades.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="desc_disponibilidad">Descripción</label>
                <input type="text" class="form-control" id="desc_disponibilidad" name="desc_disponibilidad" required>
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
            <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
