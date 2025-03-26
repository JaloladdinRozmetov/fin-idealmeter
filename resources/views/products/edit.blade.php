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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('product.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Mahsulot Nomi</label>
                                <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror"
                                       value="{{ old('product_name', $product->product_name) }}" required>
                                @error('product_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Turi</label>
                                <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror"
                                       value="{{ old('type', $product->type) }}" required>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="producer" class="form-label">Ishlab chiqaruvchi</label>
                                <input type="text" name="producer" id="producer" class="form-control @error('producer') is-invalid @enderror"
                                       value="{{ old('producer', $product->producer) }}" required>
                                @error('producer')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="dealer_price" class="form-label">Diler Narxi</label>
                                <input type="number" name="dealer_price" id="dealer_price" class="form-control @error('dealer_price') is-invalid @enderror"
                                       value="{{ old('dealer_price', $product->dealer_price) }}" required>
                                @error('dealer_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sale_price" class="form-label">Sotuv Narxi</label>
                                <input type="number" name="sale_price" id="sale_price" class="form-control @error('sale_price') is-invalid @enderror"
                                       value="{{ old('sale_price', $product->sale_price) }}" required>
                                @error('sale_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="barcode" class="form-label">Shtrix Kod</label>
                                <input type="text" name="barcode" id="barcode" class="form-control @error('barcode') is-invalid @enderror"
                                       value="{{ old('barcode', $product->barcode) }}" required>
                                @error('barcode')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('product.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Orqaga
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Yangilash
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
