@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Crear Nuevo Empleado</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_usuario">Usuario</label>
            <select class="form-control" name="id_usuario" id="id_usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}</option>
                @endforeach
            </select>
            @error('id_usuario')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_puesto">Puesto</label>
            <select class="form-control" name="id_puesto" id="id_puesto" required>
                <option value="">Seleccione un puesto</option>
                @foreach($puestos as $puesto)
                    <option value="{{ $puesto->id_puesto }}">{{ $puesto->nombre }}</option>
                @endforeach
            </select>
            @error('id_puesto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_contrato">Fecha de Contrato</label>
            <input type="date" class="form-control" name="fecha_contrato" id="fecha_contrato" required>
            @error('fecha_contrato')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="salario">Salario</label>
            <input type="number" class="form-control" name="salario" id="salario" step="0.01" required>
            @error('salario')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Crear Empleado</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
