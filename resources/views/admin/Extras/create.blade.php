@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Crear un nuevo Extra</h1>

    <form action="{{ route('extras.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="desc_extra">Descripción del Extra</label>
            <input type="text" name="desc_extra" id="desc_extra" class="form-control" value="{{ old('desc_extra') }}">
            @error('desc_extra')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio_extra">Precio del Extra</label>
            <input type="text" name="precio_extra" id="precio_extra" class="form-control" value="{{ old('precio_extra') }}">
            @error('precio_extra')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
