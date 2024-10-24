@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Tipo de Cliente</h1>

        <form action="{{ route('tipos_clientes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="desc_tipo_cliente">Descripción</label>
                <input type="text" class="form-control" id="desc_tipo_cliente" name="desc_tipo_cliente" required>
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
            <a href="{{ route('tipos_clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
