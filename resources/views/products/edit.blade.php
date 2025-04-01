@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-pencil-square"></i> Mahsulotni Tahrirlash
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-bold">Kategory:</label>
                                <a href="{{ route('categories.create') }}" class="btn btn-success m-1">&#43;</a>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Kategory tanlang</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="product_name" class="form-label">Mahsulot Nomi</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Turi</label>
                                <input type="text" name="type" id="type" class="form-control" value="{{ $product->type }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="producer" class="form-label">Ishlab chiqaruvchi</label>
                                <input type="text" name="producer" id="producer" class="form-control" value="{{ $product->producer }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="barcode" class="form-label">Shtrix Kod</label>
                                <input type="text" name="barcode" id="barcode" class="form-control" value="{{ $product->barcode }}" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('product.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Orqaga
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Saqlash
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
