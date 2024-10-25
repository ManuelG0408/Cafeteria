@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Crear Producto Perecedero</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos_perecederos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_producto">Producto</label>
            <select class="form-control" name="id_producto" id="id_producto" required>
                <option value="">Seleccione un producto</option>
                @foreach($productos as $prod)
                    <option value="{{ $prod->id_producto}}">{{ $prod->nom_producto }}</option>
                @endforeach
            </select>
            @error('id_producto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_disponibilidad">Disponibilidades</label>
            <select class="form-control" name="id_disponibilidad" id="id_disponibilidad" required>
                <option value="">Seleccione una disponibilidad</option>
                @foreach($disponibilidades as $disp)
                    <option value="{{ $disp->id_disponibilidad}}">{{ $disp->desc_disponibilidad }}</option>
                @endforeach
            </select>
            @error('id_disponibilidad')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success mt-3">Crear</button>
        <a href="{{ route('productos_perecederos.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>
@endsection
