@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Crear Estado de Pedido</h1>
    <form action="{{ route('estados_pedidos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="desc_estado_pedido">Descripción<span style="color: red;">*</span></label>
            <input type="text" name="desc_estado_pedido" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('estados_pedidos.index') }}" class="btn btn-secondary">Cancelar</a> 
    </form>
</div>
@endsection
