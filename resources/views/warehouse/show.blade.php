@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-eye"></i> Omborxona Tafsilotlari
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Omborxona Nomi:</label>
                            <p class="form-control-plaintext">{{ $warehouse->name }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('warehouse.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Orqaga
                            </a>
                            <a href="{{ route('warehouse.edit', $warehouse->id) }}" class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i> Tahrirlash
                            </a>
                        </div>
                        <hr>
                        <div class="d-grid">
                            <a href="{{ route('purchases.create', ['warehouse_id' => $warehouse->id]) }}" class="btn btn-success">
                                <i class="bi bi-plus-circle"></i> Yangi Xarid Qo'shish
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
