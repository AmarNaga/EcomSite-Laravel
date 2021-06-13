<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     $products = Product::latest()->get();
//     $hotItem = Product::hotItem()->get();
//     return view('index', compact(['products', 'hotItem']));
// })->name('home');

Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('home');

// Route::get('/products/{product}', function(Product $product) {
    
//     return view('product', ['product' => $product]);
// });

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/products/{product}', [ProductsController::class,'show'])->name('single-product');
Route::get('/categories/{category}', function(Category $category) {
    // $products = Product::whereCategoryId($category->id)->get();
    $products = $category->products;
    return view('category', ['products' => $products, 'category' => $category]);
});

//For search in main page
Route::get('/search', [SearchController::class, 'search'])->name('search');

//Cart controller
Route::resource('/cart', CartController::class);

Route::get('empty', function(){
    Cart::destroy();
    return Cart::content();
});

Route::resource('ad/products', ProductsController::class);
// Route::get('ad/categories/view',[CategoriesController::class, 'index']);
Route::resource('ad/categories', CategoriesController::class);
Route::get('ad/dashboard', [DashboardController::class, 'index'])->name('dash');
    

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
