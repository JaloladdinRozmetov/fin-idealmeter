<?php

namespace App\Repositories;

use App\Models\Purchase;

class PurchaseRepository
{
    /**
     * Get all purchases.
     */
    public function getAll()
    {
        return Purchase::query()->with('product')->paginate(15);
    }

    /**
     * Get a single purchase by ID.
     */
    public function findById(int $id)
    {
        return Purchase::findOrFail($id);
    }

    /**
     * Store a new purchase.
     */
    public function create(array $data)
    {
        $data['entire_price_all'] = $data['quantity'] * $data['entire_price_per'];
        return Purchase::create($data);
    }

    /**
     * Update an existing purchase.
     */
    public function update(int $id, array $data)
    {
        $purchase = $this->findById($id);
        $data['entire_price_all'] = $data['quantity'] * $data['entire_price_per'];
        $purchase->update($data);
        return $purchase;
    }

    /**
     * Delete a purchase.
     */
    public function delete(int $id)
    {
        $purchase = $this->findById($id);
        return $purchase->delete();
    }
}
