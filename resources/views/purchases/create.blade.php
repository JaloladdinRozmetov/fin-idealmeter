@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <i class="bi bi-cart-plus"></i> Yangi Xarid
                    </div>
                    <div class="card-body">
                        <form action="{{ route('purchases.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Omborxona:</label>
                                <input type="text" class="form-control" value="{{ $warehouse->name }}" disabled>
                                <input type="hidden" name="warehouse_id" value="{{ $warehouse->id }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tovar:</label>
                                <a href="{{route('product.create')}}" class="btn btn-success m-1">&#43;</a>
                                <select name="product_id" class="form-control" required>
                                    <option value="">Tovar tanlang</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Shartnoma Raqami:</label>
                                <input type="text" name="contract_number" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Miqdori:</label>
                                <input type="number" name="quantity" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Narxi (dona):</label>
                                <input type="number" name="entire_price_per" class="form-control" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Shtrix Kod:</label>
                                <input type="text" name="barcode" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('warehouse.show', $warehouse->id) }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Orqaga
                                </a>
                                <button type="submit" class="btn btn-success">
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
