<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {
        if ($slug === null) {
            $categories = Category::all();
        } else {
            $categories = Category::where('slug', $slug)->get();
        }

        return view('/admin/category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

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

        $categories = new Category();
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name);
        $categories->link = $request->link;
        $categories->image = $image_name;
        $categories->save();

        return redirect()->back()->with('successAdd', 'Category Berhasil Ditambahkan!');
    }

    // Update
    public function update(Request $request, $id)
    {
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

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->link = $request->link;
        $category->image = $image_name ? $image_name : $category->image;
        $category->save();

        return redirect()->back()->with('successEdit', 'Category Berhasil Diupdate!');
    }

    // Delete
    public function delete($id)
    {
        Category::destroy($id);

        return redirect()->back()->with('success', 'Category Berhasil Dihapus!');
    }
}
