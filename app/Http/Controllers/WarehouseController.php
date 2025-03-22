<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;
use App\Services\WarehouseService;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    protected WarehouseService $warehouseService ;

    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $warehouses = $this->warehouseService->getAllWarehouses();

        return view('warehouse.index', compact('warehouses'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('warehouse.create');
    }

    /**
     * @param WarehouseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(WarehouseRequest $request)
    {
        $this->warehouseService->createWarehouse($request->validated());

        return redirect()->route('warehouse.index')
            ->with('success', 'Omborxona muvafaqiyatli yaratildi!');
    }

    /**
     * @param Warehouse $warehouse
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouse.edit', compact('warehouse'));
    }


    /**
     * @param $id
     * @param WarehouseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id,WarehouseRequest $request)
    {
        $this->warehouseService->updateWarehouse($id,$request->validated());

        return redirect()->route('warehouse.index')->with('success',"Omborxona muvafaqiyatli o'zgartirldi");
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show($id)
    {
        $warehouse = $this->warehouseService->getWarehouse($id);

        return view('warehouse.show',compact('warehouse'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->warehouseService->deleteWarehouse($id);

        return redirect()->route('warehouse.index');
    }
}
