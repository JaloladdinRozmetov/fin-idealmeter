<?php

namespace App\Services;

use App\Models\Purchase;
use App\Repositories\PurchaseRepository;

class PurchaseService
{
    protected $purchaseRepository;

    public function __construct(PurchaseRepository $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    /**
     * Get all purchases.
     */
    public function getAllPurchases()
    {
        return $this->purchaseRepository->getAll();
    }

    /**
     * Get a single purchase.
     */
    public function getPurchaseById(int $id)
    {
        return $this->purchaseRepository->findById($id);
    }

    /**
     * Create a new purchase.
     */
    public function createPurchase(array $data)
    {
        return $this->purchaseRepository->create($data);
    }

    /**
     * Update an existing purchase.
     */
    public function updatePurchase(int $id, array $data)
    {
        return $this->purchaseRepository->update($id, $data);
    }

    /**
     * Delete a purchase.
     */
    public function deletePurchase(int $id)
    {
        return $this->purchaseRepository->delete($id);
    }
}
