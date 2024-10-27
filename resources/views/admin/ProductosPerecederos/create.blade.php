@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Agregar Producto Perecedero</h1>

    <form action="{{ route('productos_perecederos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_producto">Producto</label>
            <select name="id_producto" id="id_producto" class="form-control">
                @foreach($productos as $producto)
                    <option value="{{ $producto->id_producto }}">{{ $producto->desc_producto }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="id_disponibilidad">Disponibilidad</label>
            <select name="id_disponibilidad" id="id_disponibilidad" class="form-control">
                @foreach($disponibilidades as $disponibilidad)
                    <option value="{{ $disponibilidad->id_disponibilidad }}">{{ $disponibilidad->descripcion }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Agregar</button>
        <a href="{{ route('productos_perecederos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
