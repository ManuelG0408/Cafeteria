@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Empleados</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <a href="{{ route('empleados.create') }}" class="btn btn-success">Crear Nuevo Empleado</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Puesto</th>
                <th>Fecha de Contrato</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id_empleado }}</td>
                    <td>{{ $empleado->usuario->nombre }} {{ $empleado->usuario->apellido_paterno }} {{ $empleado->usuario->apellido_materno }}</td> 
                    <td>{{ $empleado->puesto->nombre }}</td>
                    <td>{{ $empleado->fecha_contrato }}</td>
                    <td>{{ $empleado->salario }}</td>
                    <td>
                        <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
