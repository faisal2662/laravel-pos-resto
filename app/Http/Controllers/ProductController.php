<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::paginate(10);
        // dd($products);
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('pages.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'stock' => 'required',
            'status' => 'required|boolean',
            'is_favorite' => 'required|boolean'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->is_favorite = $request->is_favorite;
        $product->save();
        
        if($request->hasFile('image')){
            $image  = $request->file('image');
            $image->storeAs('public/products', $product->id. '.' . $image->getClientOriginalExtension());
            $product->image = 'storage/products/' . $product->id. '. '. $image->getClientOriginalExtension();
            $product->save();
        }


        return redirect()->route('products.index')->with('success', 'Product created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('pages.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        $categories = Category::all();
        return view('pages.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
            $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'stock' => 'required',
            'status' => 'required|boolean',
            'is_favorite' => 'required|boolean'
        ]);

        $product = Product::find( $id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->is_favorite = $request->is_favorite;
        $product->save();
        
  if($request->hasFile('image')){
            $image  = $request->file('image');
            $image->storeAs('public/products', $product->id. '.' . $image->getClientOriginalExtension());
            $product->image = 'storage/products/' . $product->id. '. '. $image->getClientOriginalExtension();
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        
        return redirect()->route('products.index')->with('success', 'Product updated successfully');

    }
}