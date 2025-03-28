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
            <h2><i class="bi bi-cart"></i> Xaridlar</h2>
        </div>

        <!-- Purchases Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead style="background-color: #007bff; color: white;">
                <tr>
                    <th>#</th>
                    <th>Shartnoma raqami</th>
                    <th>Ombor</th>
                    <th>Mahsulot</th>
                    <th>Miqdori</th>
                    <th>Bitta narxi</th>
                    <th>Jami narxi</th>
                    <th>Shtrix kod</th>
                    <th>Amallar</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($purchases as $index => $purchase)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $purchase->contract_number }}</td>
                        <td>{{ $purchase->warehouse->name }}</td>
                        <td>{{ $purchase->product->product_name }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>{{ number_format($purchase->entire_price_per, 2) }} UZS</td>
                        <td>{{ number_format($purchase->entire_price_all, 2) }} UZS</td>
                        <td>{{ $purchase->barcode }}</td>
                        <td>
                            <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" class="d-inline">
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
                        <td colspan="9" class="text-center">Hech qanday xarid topilmadi</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
