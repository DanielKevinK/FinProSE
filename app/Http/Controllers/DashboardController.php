<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Investment;
use App\Models\Product;
use DataTables;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        $invest = Investment::with(['products', 'investors'])->where('investor_id', $user->id)->get();
        $investment = $invest->map(function ($items) {
            $carts = Cart::where('id_product', $items->products->id)->get();
            $totalQuantity = 0;
            foreach ($carts as $cartItem) {
                $totalQuantity += $cartItem->quantity;
            }

            return [
                'id' => $items->id,
                'product' => $items->products->name,
                'investor' => $items->investors->name,
                'commission' => $items->commission,
                'income' => $items->income,
                'quantity' => $items->invest_quantity,
                'totalCommission' => (($items->commission / 100) * $items->products->price) * $totalQuantity
            ];
        });

        return view('/admin/home', compact('investment'));
    }
}
