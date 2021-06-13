<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(8)->get();
        return view('admin-dash.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-dash.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'product_name' => 'required|max:255|unique:products',
            'product_desc' => 'required',
            'price' => 'required',
            'category_id' => 'required|integer|min:1',
        ],
        [
            'required' => ':attribute is required',
            'product_name.required' => 'Product Name is required.'
        ]
        );
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->slug = $request->input('slug');
        $product->details = $request->input('details');
        $product->product_desc = $request->input('product_desc');
        $product->price = $request->input('price');
        
        // return $request;
        if ($request->hasFile('image_upload')) {
            // uploading image to images folder
            $name = $request->file('image_upload')->getClientOriginalName();
            $request->file('image_upload')->storeAs('public/images', $name);
            // croping the image and saving it to thumbnail folder inside images folder
            // $image_resize = Image::make(storage_path('app/public/images/'.$name));
            // $image_resize->resize(550, 750);
            // $image_resize->save(storage_path('app/public/images/thumbnail/'.$name));
           // image_crop($name, 550, 750);
            $product->image = $name;
        }
        // return $product;
        if($product->save()){
            return redirect()->route('products.index');
        }else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // return $slug;
        $product =Product::where('slug', $slug)->firstOrFail();
        $hotItem = Product::where('slug', '!=', $slug)->hotItem()->get();

        return view('product',compact(['product', 'hotItem']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin-dash.products.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
//         return "yes";
        $validated = $request->validate([
            'product_name' => 'required|max:255|unique:products',
            'product_desc' => 'required',
            'price' => 'required',
            'category_id' => 'required|integer|min:1',
        ],
        [
            'required' => ':attribute is required',
            'product_name.required' => 'Product Name is required.'
        ]
        );

        $product->product_name = $request->input('product_name');
        $product->product_desc = $request->input('product_desc');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->save();

        if($product->save()){
            return redirect()->route('products.index');
        }else{
            return 'not updated';
        }

        // $product->product_name = $request->input('product_name');
        // $product->product_desc = $request->input('product_desc');
        // $product->price = $request->input('price');
        // $product->category_id = $request->input('category_id');
        // $product->save();

        // return redirect()->route('products.index');


    }
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Searching product 
     */
    // public function search(){
    //     $search_text = $_GET['query'];
    //     $products = Product::where('title', 'LIKE', '%'.$search_text.'%')->with('category')->get();

    //     return view ('Products/search', compact('products'));
    // }

    public function destroy($id)
    {
        //
    }
}
