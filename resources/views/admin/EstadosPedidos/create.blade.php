@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Crear un nuevo Estado de Pedido</h1>

    <form action="{{ route('estados_pedidos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="desc_estado_pedido">Descripción del Estado</label>
            <input type="text" name="desc_estado_pedido" id="desc_estado_pedido" class="form-control" value="{{ old('desc_estado_pedido') }}">
            @error('desc_estado_pedido')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
