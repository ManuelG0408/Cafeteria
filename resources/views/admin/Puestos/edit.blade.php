@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Editar Puesto</h1>
    <form action="{{ route('puestos.update', $puesto->id_puesto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="desc_puesto">Descripción del Puesto<span style="color: red;">*</span></label>
            <input type="text" name="desc_puesto" id="desc_puesto" class="form-control" value="{{ $puesto->desc_puesto }}" required>
            @error('desc_puesto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('puestos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
