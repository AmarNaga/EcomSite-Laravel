<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
        // $products = Product::latest()->search(request(['query', 'category']))->get();
        $products = Product::latest();
        if(request('query') !==''){
            $products = Product::where('product_name', 'like', '%'.request('query').'%')->paginate(9);           
            $products->appends($request->all());
            $categories = Category::all();
            
        }

        return view('products/search', compact(['products', 'categories']));
    }
}
