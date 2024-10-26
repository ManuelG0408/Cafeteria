@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Editar Proveedor</h1>
    <form action="{{ route('proovedores.update', $proovedor->id_proovedor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_usuario">Usuario<span style="color: red;">*</span></label>
            <select name="id_usuario" id="id_usuario" class="form-control" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $proovedor->id_usuario == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="empresa">Nombre de la Empresa<span style="color: red;">*</span></label>
            <input type="text" name="empresa" id="empresa" class="form-control" value="{{ $proovedor->empresa }}" required>
            @error('empresa')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="rfc">RFC<span style="color: red;">*</span></label>
            <input type="text" name="rfc" id="rfc" class="form-control" value="{{ $proovedor->rfc }}" required>
            @error('rfc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('proovedores.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
