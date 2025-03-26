<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllProducts()
    {
        return $this->repository->getAll();
    }

    public function getProductById($id)
    {
        return $this->repository->find($id);
    }

    public function createProduct(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateProduct($product, array $data)
    {
        return $this->repository->update($product, $data);
    }

    public function deleteProduct(Product $product)
    {
        return $this->repository->delete($product);
    }

    public function restoreProduct($id)
    {
        return $this->repository->restore($id);
    }
}
