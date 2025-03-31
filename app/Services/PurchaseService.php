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
        if ($data['currency'] == 'USD')
        {
            $data['entire_price_all'] = $data['quantity'] * $data['uzs_price'];
            $data ['entire_price_per'] = $data['uzs_price'];

        }else {
            $data['entire_price_all'] = $data['quantity'] * $data['entire_price_per'];
        }
        $data ['currency'] = 'UZS';

        return $this->purchaseRepository->create($data);
    }

    /**
     * Update an existing purchase.
     */
    public function updatePurchase(int $id, array $data)
    {
        if ($data['currency'] == 'USD')
        {
            $data['entire_price_all'] = $data['quantity'] * $data['uzs_price'];
            $data ['entire_price_per'] = $data['uzs_price'];

        }else {
            $data['entire_price_all'] = $data['quantity'] * $data['entire_price_per'];
        }
        $data ['currency'] = 'UZS';

        return $this->purchaseRepository->update($id, $data);
    }

    /**
     * Delete a purchase.
     */
    public function deletePurchase(int $id)
    {
        return $this->purchaseRepository->delete($id);
    }

    public function getPurchaseWithOneById(int $id,string $field)
    {
        return $this->purchaseRepository->getPurchaseWithOne($id,$field);
    }
}
