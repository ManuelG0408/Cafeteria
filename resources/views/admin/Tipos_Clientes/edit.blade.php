@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Editar Tipo de Cliente</h1>
    <form action="{{ route('tipos_clientes.update', $tipoCliente->id_tipo_cliente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="desc_tipo_cliente">Descripción del Tipo de Cliente<span style="color: red;">*</span></label>
            <input type="text" name="desc_tipo_cliente" id="desc_tipo_cliente" class="form-control" value="{{ $tipoCliente->desc_tipo_cliente }}" required>
            @error('desc_tipo_cliente')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('tipos_clientes.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
