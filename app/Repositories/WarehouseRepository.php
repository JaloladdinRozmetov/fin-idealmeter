<?php
// app/Repositories/Eloquent/WarehouseRepository.php
namespace App\Repositories;

use App\Models\Warehouse;

class WarehouseRepository
{
    protected $model;

    public function __construct(Warehouse $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $warehouse = $this->find($id);
        $warehouse->update($data);
        return $warehouse;
    }

    public function delete($id)
    {
        $warehouse = $this->find($id);
        return $warehouse->delete();
    }
}
