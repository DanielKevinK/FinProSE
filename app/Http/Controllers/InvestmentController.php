<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Investment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if ($id === null) {
            $investments = Investment::with(['products', 'investors'])->get();
        } else {
            $investments = Investment::with(['products', 'investors'])->where('id', $id)->get();
        }
        $products = Product::all();
        $investments = $investments->map(function ($items) {
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
                'totalCommission' => (($items->commission / 100) * $items->products->price) * $totalQuantity
            ];
        });

        return view('/admin/investment', compact('investments', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'commission' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $product = Product::find($request->product_id);
        if (!$product) {
            return redirect()->back()->with('failedAdd', 'Product Not Found!');
        }

        $user = new User();
        $user->role = 'investor';
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        if ($user) {
            $investments = new Investment();
            $investments->product_id = $request->product_id;
            $investments->investor_id = $user->id;
            $investments->commission = $request->commission;
            $investments->save();

            return redirect()->back()->with('successAdd', 'Investment Berhasil Ditambahkan!');
        }

        return redirect()->back()->with('failedAdd', 'Investor Not Found!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $investment = Investment::find($id);
        if (!$investment) {
            return redirect()->back()->with('failedEdit', 'Investment Not Found!');
        }

        $investment->commission = $request->commission;
        $investment->save();

        return redirect()->back()->with('successEdit', 'Investment Berhasil Diupdate!');
    }

    // Delete
    public function delete($id)
    {
        $investment = Investment::find($id);
        if ($investment) {
            $investment->delete();
        }

        return redirect()->back()->with('success', 'Produk Berhasil Dihapus!');
    }
}
