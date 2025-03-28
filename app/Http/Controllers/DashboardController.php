<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $countProducts = Product::query()->count();

        $countWarehouses = Warehouse::query()->count();

        $countPurchases = Purchase::all()->count();

        return view('dashboard',compact('countProducts','countWarehouses','countPurchases'));
    }
}
