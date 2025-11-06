@extends('layouts.app')

@section('title', 'Detalle de producto')

@section('content')
<h1 class="h3 mb-3">Detalle de producto</h1>

<div class="card">
  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">ID</dt>
      <dd class="col-sm-9">{{ $product->id }}</dd>

      <dt class="col-sm-3">Descripción</dt>
      <dd class="col-sm-9">{{ $product->description }}</dd>

      <dt class="col-sm-3">Precio</dt>
      <dd class="col-sm-9">${{ number_format($product->price, 2) }}</dd>

      <dt class="col-sm-3">Stock</dt>
      <dd class="col-sm-9">{{ $product->stock }}</dd>

      <dt class="col-sm-3">Creado</dt>
      <dd class="col-sm-9">{{ $product->created_at }}</dd>
    </dl>

    <div class="d-flex gap-2">
      <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-secondary">Editar</a>
      <a href="{{ route('products.index') }}" class="btn btn-light">Volver</a>
    </div>
  </div>
</div>
@endsection
