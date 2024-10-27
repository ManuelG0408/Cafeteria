@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>
    <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_usuario">Usuario</label>
            <select name="id_usuario" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $cliente->id_usuario == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }} {{ $cliente->usuario->apellido_paterno }} {{ $cliente->usuario->apellido_materno }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_tipo_cliente">Tipo de Cliente</label>
            <select name="id_tipo_cliente" class="form-control" required>
                @foreach($tiposClientes as $tipo)
                    <option value="{{ $tipo->id_tipo_cliente }}" {{ $cliente->id_tipo_cliente == $tipo->id_tipo_cliente ? 'selected' : '' }}>{{ $tipo->desc_tipo_cliente }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="number" name="saldo" class="form-control" value="{{ $cliente->saldo }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
