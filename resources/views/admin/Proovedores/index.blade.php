@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Proveedores</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <a href="{{ route('proovedores.create') }}" class="btn btn-success">Crear Nuevo Proveedor</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Empresa</th>
                <th>RFC</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proovedores as $proovedor)
                <tr>
                    <td>{{ $proovedor->id_proovedor }}</td>
                    <td>{{ $proovedor->usuario->nombre }} {{ $proovedor->usuario->apellido_paterno }} {{ $proovedor->usuario->apellido_materno }}</td>
                    <td>{{ $proovedor->empresa }}</td>
                    <td>{{ $proovedor->rfc }}</td>
                    <td>
                        <a href="{{ route('proovedores.edit', $proovedor->id_proovedor) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('proovedores.destroy', $proovedor->id_proovedor) }}" method="POST" style="display:inline;">
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
