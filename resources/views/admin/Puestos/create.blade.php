@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Crear un nuevo Puesto</h1>

    <form action="{{ route('puestos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="desc_puesto">Descripción del Puesto</label>
            <input type="text" name="desc_puesto" id="desc_puesto" class="form-control" value="{{ old('desc_puesto') }}">
            @error('desc_puesto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
