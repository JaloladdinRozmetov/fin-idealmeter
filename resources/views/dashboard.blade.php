<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard</h2>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p>Welcome, <strong>{{ auth()->user()->name }}</strong>! This is your dashboard.</p>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Omborxona soni</h5>
                                        <p class="card-text">{{$countWarehouses}} Active bo'lganlar</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Barcha Buyurtmalar</h5>
                                        <p class="card-text">{{$countPurchases}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-warning mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Tovarlar soni</h5>
                                        <p class="card-text">{{$countProducts}} Active Tovarlar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('warehouse.index') }}" class="btn btn-outline-primary">
                            <i class="bi bi-box"></i> Omborxonalarga o'tish
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
