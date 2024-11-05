@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Editar Disponibilidad</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('disponibilidades.update', $disponibilidad->id_disponibilidad) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="desc_disponibilidad">Descripción</label>
                <input type="text" name="desc_disponibilidad" class="form-control" value="{{ old('desc_disponibilidad', $disponibilidad->desc_disponibilidad) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Disponibilidad</button>
            <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
@endsection
