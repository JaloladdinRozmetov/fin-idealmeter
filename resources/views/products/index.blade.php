@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Success & Error Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle"></i> Iltimos, quyidagi xatolarni to'g'rilang:
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-box-seam"></i> Mahsulotlar</h2>
            <a href="{{ route('product.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i> Yangisini kiritish
            </a>
        </div>

        <!-- Products Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead  style=" background-color: #007bff;">
                <tr>
                    <th>#</th>
                    <th>Mahsulot nomi</th>
                    <th>Turi</th>
                    <th>Ishlab chiqaruvchi</th>
                    <th>Shtrix kod</th>
                    <th>Amallar</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->producer }}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Haqiqatan ham o‘chirib tashlamoqchimisiz?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Hech qanday mahsulot topilmadi</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
