<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/* View Home */
Route::get('/', function () {
    $products = Product::select('products.*')
    ->join('carts', 'carts.id_product', '=', 'products.id')
    ->groupBy('products.id')
    ->orderByRaw('COUNT(carts.id) DESC')
    ->take(10)
    ->get();
    
    $newProducts = Product::orderBy('created_at', 'desc')
    ->take(10)
    ->get();

    $categories = Category::all();

    return view('main.home', compact('products', 'newProducts', 'categories'));
});
/* View Login & Register */
Route::get('/sign-in', function () {
    return view('main.signIn');
});
Route::get('/investor-register', function () {
    $products = Product::all();

    return view('main.investorRegister', compact('products'));
});
/* Function Login & Register */
Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/register-investor', [App\Http\Controllers\UserController::class, 'registerInvestor'])->name('register-investor');

/* View About Us */
Route::get('/about', function () {
    $categories = Category::all();

    return view('main.about', compact('categories'));
});

/* View Shop by Category */
Route::get('/shop/{category}', [App\Http\Controllers\ProductController::class, 'getProduct'])->name('shop-product');
/* Function Search Product */
Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');
/* View Detail Product by ID */
Route::get('/shop/{category}/{slug}', [App\Http\Controllers\ProductController::class, 'getDetailProduct'])->name('shop-category');
/* Function Add To Cart */
Route::post('/cart-add/{id}', [App\Http\Controllers\CartController::class, 'addCart'])->name('cart-add');
/* Function Remove From Cart */
Route::post('/cart-remove/{id}', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart-remove');
Route::post('/cart-checkout', [App\Http\Controllers\CartController::class, 'checkoutCart'])->name('cart-checkout');

/* View Cart */
Route::get('/cart', [App\Http\Controllers\CartController::class, 'getCart'])->name('cart');

Route::group(['prefix' => '/home'], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'home'])->name('home');

    Route::get('/product', [App\Http\Controllers\ProductController::class, 'product'])->name('product');
    Route::post('/product-add', [App\Http\Controllers\ProductController::class, 'storeProduct'])->name('product-add');
    Route::post('/product-edit/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('product-edit');
    Route::get('/product-delete/{id}', [App\Http\Controllers\ProductController::class, 'productDelete'])->name('product-delete');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::post('/user-add', [App\Http\Controllers\UserController::class, 'store'])->name('user-add');
    Route::post('/user-edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user-edit');
    Route::get('/user-delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user-delete');

    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::post('/category-add', [App\Http\Controllers\CategoryController::class, 'create'])->name('category-add');
    Route::post('/category-edit/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category-edit');
    Route::get('/category-delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category-delete');

    Route::get('/investment', [App\Http\Controllers\InvestmentController::class, 'index'])->name('investment');
    Route::post('/investment-add', [App\Http\Controllers\InvestmentController::class, 'create'])->name('investment-add');
    Route::post('/investment-edit/{id}', [App\Http\Controllers\InvestmentController::class, 'edit'])->name('investment-edit');
    Route::get('/investment-delete/{id}', [App\Http\Controllers\InvestmentController::class, 'delete'])->name('investment-delete');
});
