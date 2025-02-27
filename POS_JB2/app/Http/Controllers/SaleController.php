<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // Fetch all sales and sum up the total amount
        $totalSales = SaleItem::sum('quantity'); // Sum of all sold products

        // Fetch individual sales (with total per sale)
        $sales = Sale::with('items.product')->get();

        return view('sales', compact('sales', 'totalSales'));
    }
}
