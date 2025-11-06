@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3">Productos</h1>
  <a href="{{ route('products.create') }}" class="btn btn-primary">Nuevo producto</a>
</div>

@if($products->count())
  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Descripción</th>
          <th class="text-end">Precio</th>
          <th class="text-end">Stock</th>
          <th>Creado</th>
          <th class="text-end">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>
              <a href="{{ route('products.show', $product) }}">{{ $product->description }}</a>
            </td>
            <td class="text-end">${{ number_format($product->price, 2) }}</td>
            <td class="text-end">{{ $product->stock }}</td>
            <td>{{ $product->created_at->format('Y-m-d H:i') }}</td>
            <td class="text-end">
              <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
              <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{ $products->links() }}
@else
  <p class="text-muted">Aún no hay productos.</p>
@endif
@endsection
