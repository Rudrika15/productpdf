<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


            $product = new Product();
            $product->name =$request->name;
            $product->price =$request->price;
            $product->Save();

            return redirect()->back()->with('message',"stored successfully");

            



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
        return view('product.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {


        $name = $request->name;
        $price = $request->price;
        $id = $request->id;
        $product =  Product::find($id);
        $product->name =$request->name;
        $product->price =$request->price;
        $product->Save();

        return redirect()->back()->with('message',"update successfully");



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $name = $request->namespace;
        $price = $request->price;

        $id = $request->id;
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message',"delete successfullyyyyyy");

    }
}
