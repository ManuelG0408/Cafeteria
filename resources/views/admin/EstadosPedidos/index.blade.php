@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h1>Lista de Estados de Pedidos</h1>
    
    <a href="{{ route('estados_pedidos.create') }}" class="btn btn-primary">Crear nuevo Estado</a>
    
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción del Estado</th>
          
            </tr>
        </thead>
        <tbody>
            @foreach($estados_pedidos as $estadopedido)
            <tr>
                <td>{{ $estadopedido->id_estado_pedido }}</td>
                <td>{{ $estadopedido->desc_estado_pedido }}</td>
       
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection