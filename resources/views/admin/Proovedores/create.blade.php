@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Crear un nuevo Proveedor</h1>
    <form action="{{ route('proovedores.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_usuario">Usuario<span style="color: red;">*</span></label>
            <select name="id_usuario" id="id_usuario" class="form-control" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="empresa">Nombre de la Empresa<span style="color: red;">*</span></label>
            <input type="text" name="empresa" id="empresa" class="form-control" value="{{ old('empresa') }}" required>
            @error('empresa')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="rfc">RFC<span style="color: red;">*</span></label>
            <input type="text" name="rfc" id="rfc" class="form-control" value="{{ old('rfc') }}" required>
            @error('rfc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        <a href="{{ route('proovedores.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
