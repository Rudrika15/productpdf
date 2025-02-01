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
        $products =DB::table('categories')
        ->crossJoin('products')
        ->select('categories.name', 'products.*')
        ->where('categories.id','=',DB::raw('products.category'))
        ->get();
        return view('admin.product.index',compact('products'));
    }

    public function dashboard()
    {
        $category =Category::count();
        $product =Product::count();
        return view('admin.dashboard.dashboard',compact('category','product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category =Category::all();
        return view('admin.product.create',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->modelno = $request->modelno;
        $product->image = $request->image;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->mrp = $request->mrp;
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->vendor = $request->vendor;
        $product->sku = $request->sku;

        $product->save();

        

        return redirect()->back()->with('message',"store successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = product::find($id);
        return view('admin.product.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $id = $request->id;


        $product = product::find($id);

        $product->modelno = $request->modelno;
        $product->image = $request->image;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->mrp = $request->mrp;
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->vendor = $request->vendor;
        $product->sku = $request->sku;
        $product->save();

        return redirect()->back()->with('message',"update Successfully");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message',"delete Successfully");

    }
}
