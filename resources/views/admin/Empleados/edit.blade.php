@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Editar Empleado</h1>

    <form action="{{ route('empleados.update', $empleado) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_usuario">Usuario</label>
            <select name="id_usuario" id="id_usuario" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $empleado->id_usuario == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_puesto">Puesto</label>
            <select name="id_puesto" id="id_puesto" class="form-control">
                @foreach($puestos as $puesto)
                    <option value="{{ $puesto->id_puesto }}" {{ $empleado->id_puesto == $puesto->id_puesto ? 'selected' : '' }}>
                        {{ $puesto->desc_puesto }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_contrato">Fecha de Contrato</label>
            <input type="date" name="fecha_contrato" id="fecha_contrato" class="form-control" value="{{ $empleado->fecha_contrato }}" required>
        </div>

        <div class="form-group">
            <label for="salario">Salario</label>
            <input type="number" name="salario" id="salario" class="form-control" step="0.01" value="{{ $empleado->salario }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
