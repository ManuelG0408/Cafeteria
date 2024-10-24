@extends('layouts.dashboard')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Crear Proveedor</h1>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <form action="{{ route('proovedores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_usuario">Usuario</label>
            <select class="form-control @error('id_usuario') is-invalid @enderror" name="id_usuario" id="id_usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}</option>
                @endforeach
            </select>
            @error('id_usuario')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="empresa">Empresa</label>
            <input type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" id="empresa" required value="{{ old('empresa') }}">
            @error('empresa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" class="form-control @error('rfc') is-invalid @enderror" name="rfc" id="rfc" required value="{{ old('rfc') }}">
            @error('rfc')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Crear Proveedor</button>
    </form>
</div>
@endsection
