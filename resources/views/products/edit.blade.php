@extends('layouts.app')

@section('title', 'Editar producto')

@section('content')
<h1 class="h3 mb-3">Editar producto</h1>

<form action="{{ route('products.update', $product) }}" method="POST" class="row g-3">
  @csrf
  @method('PUT')
  <div class="col-12">
    <label for="description" class="form-label">Descripción</label>
    <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $product->description) }}" required>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>
  <div class="col-md-6">
    <label for="price" class="form-label">Precio</label>
    <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required>
    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>
  <div class="col-md-6">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}" required>
    @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>
  <div class="col-12 d-flex gap-2">
    <a href="{{ route('products.index') }}" class="btn btn-light">Cancelar</a>
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>
@endsection
