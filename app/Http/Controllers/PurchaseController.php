<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Models\Purchase;
use App\Services\ProductService;
use App\Services\PurchaseService;
use App\Services\WarehouseService;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    protected PurchaseService $purchaseService;
    protected WarehouseService $warehouseService;
    protected ProductService $productService;

    /**
     * @param WarehouseService $warehouseService
     * @param PurchaseService $purchaseService
     * @param ProductService $productService
     */
    public function __construct(WarehouseService $warehouseService, PurchaseService $purchaseService, ProductService $productService)
    {
        $this->warehouseService = $warehouseService;
        $this->purchaseService = $purchaseService;
        $this->productService = $productService;
    }


    public function index()
    {
        $purchases = $this->purchaseService->getAllPurchases();

        return view('purchases.index', compact('purchases'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create(PurchaseRequest $request)
    {
        $warehouse = $this->warehouseService->getWarehouse($request->validated()['warehouse_id']);
        $products = $this->productService->getAllProducts();

        return view('purchases.create', compact('warehouse', 'products'));
    }

    /**
     * @param PurchaseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PurchaseRequest $request)
    {
        $this->purchaseService->store($request->validated());

        return redirect()->route('warehouse.show', $request->warehouse_id)
            ->with('success', 'Xarid muvaffaqiyatli qo\'shildi.');
    }
}
