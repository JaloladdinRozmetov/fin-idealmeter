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
                <i class="bi bi-exclamation-triangle"></i> Please fix the following errors:
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
            <h2><i class="bi bi-box"></i> Omborxonalar</h2>
            <a href="{{ route('warehouse.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i> Yangisini kiritish
            </a>
        </div>

        <!-- Warehouses Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($warehouses as $warehouse)
                <div class="col">
                    <div class="card warehouse-card shadow-sm border-0"
                         onclick="window.location='{{ route('warehouse.show', $warehouse->id) }}'"
                         style="cursor: pointer; background-color: #007bff; color: white;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $warehouse->name }}</h5>
                            <p class="card-text">
                                <i class="bi bi-geo-alt"></i> {{ $warehouse->location }}
                            </p>
                            <p class="card-text text-white-50">
                                <small>Created: {{ $warehouse->created_at->format('d/m/Y') }}</small>
                            </p>
                        </div>
                        <div class="card-footer bg-primary border-top-0 d-flex justify-content-between">
                            <div>
                                <a href="{{ route('warehouse.edit', $warehouse->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('warehouse.destroy', $warehouse->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No warehouses found
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
