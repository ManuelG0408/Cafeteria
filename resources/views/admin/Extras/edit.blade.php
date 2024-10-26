@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Editar Extra</h1>
    <form action="{{ route('extras.update', $extra->id_extra) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="desc_extra">Descripción del Extra<span style="color: red;">*</span></label>
            <input type="text" name="desc_extra" id="desc_extra" class="form-control" value="{{ $extra->desc_extra }}" required>
            @error('desc_extra')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio_extra">Precio del Extra<span style="color: red;">*</span></label>
            <input type="text" name="precio_extra" id="precio_extra" class="form-control" value="{{ $extra->precio_extra }}" required>
            @error('precio_extra')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('extras.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
