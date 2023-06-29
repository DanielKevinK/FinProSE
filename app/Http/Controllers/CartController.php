<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Investment;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        $auth = auth()->user();
        $categories = Category::all();
        $totalCart = 0;

        $carts = Cart::with('products')->where('id_user', $auth->id)->where('status', 0)->get();
        $carts = $carts->map(function ($item) use (&$totalCart) {
            if ($item->products) {
                $totalCart += $item->quantity * $item->products->price;
                return [
                    'id' => $item->id,
                    'product_name' => $item->products->name,
                    'product_image' => $item->products->image,
                    'price' => $item->products->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->quantity * $item->products->price,
                ];
            } else {
                return [
                    'id' => $item->id,
                    'product_name' => '',
                    'product_image' => '',
                    'price' => 0,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->quantity * 0,
                ];
            }
        });

        return view('main.cart', compact('carts', 'totalCart', 'categories'));
    }

    public function addCart(Request $request, $id)
    {
        $auth = auth()->user();
        $products = Product::find($id);
        if ($products) {
            if ($products->stock >= $request->valueCart) {
                $cartFind = Cart::where('id_user', $auth->id)->where('id_product', $products->id)->where('status', 0)->first();
                if ($cartFind) {
                    $cartFind->quantity += $request->valueCart;
                    $cartFind->save();

                    if ($cartFind) {
                        return redirect()->back()->with('success', 'Produk Quantity berhasil ditambahkan ke keranjang.');
                    }
                } else {
                    $cart = Cart::create([
                        'id_user' => $auth->id,
                        'id_product' => $products->id,
                        'quantity' => $request->valueCart
                    ]);

                    if ($cart) {
                        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
                    }
                }
            } else {
                return redirect()->back()->with('failed', 'Stock Tidak Cukup!');
            }
        } else {
            return redirect()->back()->with('failed', 'Product Tidak Ditemukan!');
        }
    }

    public function removeCart($id)
    {
        $auth = auth()->user();
        $cart = Cart::find($id);
        if ($cart) {
            if ($cart->id_user === $auth->id) {
                $cart->delete();
                return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
            } else {
                return redirect()->back()->with('failed', 'Bukan Milik Anda!');
            }
        }
    }

    public function checkoutCart()
    {
        $auth = auth()->user();
        $carts = Cart::with('products')->where('id_user', $auth->id)->where('status', 0)->get();
        if (!$carts->isEmpty()) {
            foreach ($carts as $item) {
                $item->status = 1;
                $item->save();
    
                $product = Product::find($item->products->id);
                $product->stock -= $item->quantity;
                $product->save();

                $investor = Investment::where('product_id', $product->id)->get();
                foreach ($investor as $inv) {
                    $totalIncome = (($inv->commission / 100) * $product->price) * $inv->invest_quantity;
                    $income = $inv->income + (($inv->commission / 100) * $product->price) * $item->quantity;
                    if ($totalIncome > ($income)) {
                        $inv->income = $income;
                        $inv->save();
                    }
                }
            }
            return redirect()->back()->with('checkout', 'Success Checkout');
        }
        return redirect()->back()->with('failedCheckout', 'Your Cart is Empty!');
    }
}
