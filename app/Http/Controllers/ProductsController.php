<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index(Request $request){
        $products = Product::latest()->paginate(12);
        $products->appends($request->all());
        $hotItem = Product::hotItem()->get();
        $categories = Category::all();

        return view('index', compact(['products', 'hotItem', 'categories']));
    }
}
