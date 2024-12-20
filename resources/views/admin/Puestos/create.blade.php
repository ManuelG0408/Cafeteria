@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Crear Nuevo Puesto</h1>
    <form action="{{ route('puestos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="desc_puesto">Descripción del Puesto<span style="color: red;">*</span></label>
            <input type="text" name="desc_puesto" id="desc_puesto" class="form-control" required>
            @error('desc_puesto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        <a href="{{ route('puestos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
