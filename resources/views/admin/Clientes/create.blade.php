@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Crear Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_usuario">Usuario<span style="color: red;">*</span></label>
            <select name="id_usuario" class="form-control" required>
                <option value="">Selecciona un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_tipo_cliente">Tipo de Cliente<span style="color: red;">*</span></label>
            <select name="id_tipo_cliente" class="form-control" required>
                <option value="">Selecciona un tipo de cliente</option>
                @foreach($tiposClientes as $tipo)
                    <option value="{{ $tipo->id_tipo_cliente }}">{{ $tipo->desc_tipo_cliente }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="saldo">Saldo<span style="color: red;">*</span></label>
            <input type="number" name="saldo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
