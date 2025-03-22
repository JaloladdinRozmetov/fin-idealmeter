@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-pencil-square"></i> Omborxonani Tahrirlash
                    </div>
                    <div class="card-body">
                        <form action="{{ route('warehouse.update', $warehouse->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Omborxona Nomi</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $warehouse->name }}" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('warehouse.index') }}" class="btn btn-secondary">
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
