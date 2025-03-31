@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-pencil-square"></i> Xaridni Tahrirlash
                    </div>
                    <div class="card-body">
                        <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-bold">Omborxona:</label>
                                <input type="text" class="form-control" value="{{ $warehouse->name }}" disabled>
                                <input type="hidden" name="warehouse_id" value="{{ $warehouse->id }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tovar:</label>
                                <select name="product_id" class="form-control" required>
                                    <option value="">Tovar tanlang</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ $purchase->product_id == $product->id ? 'selected' : '' }}>
                                            {{ $product->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Shartnoma Raqami:</label>
                                <input type="text" name="contract_number" class="form-control" value="{{ $purchase->contract_number }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Miqdori:</label>
                                <input type="number" name="quantity" class="form-control" value="{{ $purchase->quantity }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="entire_price_per" class="form-label">Narxi:</label>
                                <input type="number" name="entire_price_per" id="price" class="form-control" step="0.01" value="{{ $purchase->entire_price_per }}" oninput="calculateUZS()">
                            </div>

                            <div class="mb-3">
                                <label for="currency" class="form-label">Valyuta</label>
                                <select name="currency" id="currency" class="form-select" onchange="toggleExchangeInput()">
                                    <option value="UZS" {{ $purchase->currency == 'UZS' ? 'selected' : '' }}>UZS</option>
                                    <option value="USD" {{ $purchase->currency == 'USD' ? 'selected' : '' }}>USD</option>
                                </select>
                            </div>

                            <div class="mb-3" id="exchange-rate-group" style="display: none;">
                                <label for="exchange_rate" class="form-label">USD dan UZS kursi</label>
                                <input type="number" name="exchange_rate" id="exchange_rate" class="form-control" step="0.01" value="{{ $purchase->exchange_rate }}" oninput="calculateUZS()">
                            </div>

                            <div class="mb-3" id="uzs-price-group" style="display: none;">
                                <label for="uzs_price" class="form-label">Narxi (UZS):</label>
                                <input type="number" name="uzs_price" id="uzs_price" class="form-control" value="{{ $purchase->uzs_price }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Shtrix Kod:</label>
                                <input type="text" name="barcode" class="form-control" value="{{ $purchase->barcode }}" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('warehouse.show', $warehouse->id) }}" class="btn btn-secondary">
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currencySelect = document.getElementById("currency");
        let exchangeRateGroup = document.getElementById("exchange-rate-group");
        let uzsPriceGroup = document.getElementById("uzs-price-group");
        let exchangeRateInput = document.getElementById("exchange_rate");
        let priceInput = document.getElementById("price");
        let uzsPriceInput = document.getElementById("uzs_price");

        function toggleExchangeInput() {
            if (currencySelect.value === "USD") {
                exchangeRateGroup.style.display = "block";
                uzsPriceGroup.style.display = "block";
            } else {
                exchangeRateGroup.style.display = "none";
                uzsPriceGroup.style.display = "none";
                uzsPriceInput.value = ""; // Reset the converted value
            }
        }

        function calculateUZS() {
            let price = parseFloat(priceInput.value) || 0;
            let exchangeRate = parseFloat(exchangeRateInput.value) || 0;

            if (currencySelect.value === "USD" && exchangeRate > 0) {
                uzsPriceInput.value = (price * exchangeRate).toFixed(2);
            } else {
                uzsPriceInput.value = "";
            }
        }

        // Initialize fields based on existing values
        toggleExchangeInput();
        calculateUZS();

        // Event listeners
        currencySelect.addEventListener("change", toggleExchangeInput);
        priceInput.addEventListener("input", calculateUZS);
        exchangeRateInput.addEventListener("input", calculateUZS);
    });
</script>
