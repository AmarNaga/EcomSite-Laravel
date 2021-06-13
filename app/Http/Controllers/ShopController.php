<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request){
        // return $products;

        if(request()->category){
            $products = Product::with('category')->whereHas('category', function($query){
                $query->where('slug', request()->category);
            })->paginate(9);
            $products->appends($request->all());
            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;

        }else{
            $products = Product::inRandomOrder()->paginate(9);
            $products->appends($request->all());

            $categories = Category::all();
            $categoryName = 'Featured';
        }
        

        return view('shop',compact(['products', 'categories', 'categoryName']));
    }
}
