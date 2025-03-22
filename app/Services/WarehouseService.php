<?php
// app/Services/WarehouseService.php
namespace App\Services;

use App\Repositories\WarehouseRepository;

class WarehouseService
{
    protected $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
    }

    public function getAllWarehouses()
    {
        return $this->warehouseRepository->all();
    }

    public function getWarehouse($id)
    {
        return $this->warehouseRepository->find($id);
    }

    public function createWarehouse(array $data)
    {
        return $this->warehouseRepository->create($data);
    }

    public function updateWarehouse($id, array $data)
    {
        return $this->warehouseRepository->update($id, $data);
    }

    public function deleteWarehouse($id)
    {
        return $this->warehouseRepository->delete($id);
    }
}
