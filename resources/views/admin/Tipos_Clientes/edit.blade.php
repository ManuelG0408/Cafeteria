@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Editar Tipo de Cliente</h1>

        <form action="{{ route('tipos_clientes.update', $tipoCliente->id_tipo_cliente) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="desc_tipo_cliente">Descripción</label>
                <input type="text" class="form-control" id="desc_tipo_cliente" name="desc_tipo_cliente" value="{{ $tipoCliente->desc_tipo_cliente }}" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('tipos_clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
