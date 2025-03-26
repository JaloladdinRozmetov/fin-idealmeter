@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-box-seam"></i> Yangi Mahsulot Qo'shish
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Mahsulot Nomi</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Turi</label>
                                <input type="text" name="type" id="type" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="producer" class="form-label">Ishlab chiqaruvchi</label>
                                <input type="text" name="producer" id="producer" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="dealer_price" class="form-label">Diler Narxi</label>
                                <input type="number" name="dealer_price" id="dealer_price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="sale_price" class="form-label">Sotuv Narxi</label>
                                <input type="number" name="sale_price" id="sale_price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="barcode" class="form-label">Shtrix Kod</label>
                                <input type="text" name="barcode" id="barcode" class="form-control" required>
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
