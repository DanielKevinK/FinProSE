<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('/admin/product', compact('products', 'categories'));
    }

    public function addProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            DB::beginTransaction();

            $image_name = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                $fileextension = $image->clientExtension();
                $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $filenamedest = Str::slug($filename) . '-' . time() . '.' . $fileextension;
                $filepath = "product/";

                $image->storeAs("public/$filepath", $filenamedest);
                $image_name = "product/" . $filenamedest;
            }

            $product = Product::create([
                'category' => $request->category,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $image_name
            ]);

            if ($product) {
                DB::commit();

                return response()->json([
                    'message' => 'Success Add Product',
                    'data' => $product
                ], 200);
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
    }

    public function storeProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            DB::beginTransaction();

            $image_name = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                $fileextension = $image->clientExtension();
                $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $filenamedest = Str::slug($filename) . '-' . time() . '.' . $fileextension;
                $filepath = "product/";

                $image->storeAs("public/$filepath", $filenamedest);
                $image_name = "product/" . $filenamedest;
            }

            $product = Product::create([
                'category' => $request->category,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $image_name
            ]);

            if ($product) {
                DB::commit();

                return redirect()->back()->with('successAdd', 'Produk Berhasil Ditambahkan!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
    }

    public function updateProduct(Request $request, $id) {
        try {
            DB::beginTransaction();
            $product = Product::find($id);

            if ($product) {
                $image_name = null;
    
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
    
                    $fileextension = $image->clientExtension();
                    $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $filenamedest = Str::slug($filename) . '-' . time() . '.' . $fileextension;
                    $filepath = "product/";
    
                    $image->storeAs("public/$filepath", $filenamedest);
                    $image_name = "product/" . $filenamedest;
                }
                
                $product->name = $request->name ? $request->name : $product->name;
                $product->slug = $request->name ? Str::slug($request->name) : $product->slug;
                $product->category = $request->category ? $request->category : $product->category;
                $product->description = $request->description ? $request->description : $product->description;
                $product->stock = $request->stock ? $request->stock : $product->stock;
                $product->price = $request->price ? $request->price : $product->price;
                $product->image = $image_name ? $image_name : $product->image;
                $product->save();
    
                if ($product) {
                    DB::commit();
    
                    return redirect()->back()->with('successEdit', 'Produk Berhasil Diupdate!');
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
    }

    public function getProduct(Request $request, $category) {
        $products = Product::where('category', $category)->get();
        $categories = Category::all();
        
        return view('shop.listProduct', compact('products', 'categories'));
    }

    public function productDelete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }

        return redirect()->back()->with('success', 'Produk Berhasil Dihapus!');
    }

    public function search(Request $request) {
        $query = $request->input('q');
        $products = Product::where('name', 'LIKE', "%$query%")->get();
        
        return view('shop.listProduct', compact('products'));
    }

    public function getDetailProduct($category, $slug) {
        $products = Product::where('slug', $slug)->first();
        $categories = Category::all();

        return view('shop.detailProduct', compact('products', 'categories'));
    }
}
