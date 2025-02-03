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


    public function bulkcreate()
    {
        return view('admin.product.bulkcreate');
    }
    public function index()
    {
        $products = DB::table('categories')
            ->crossJoin('products')
            ->select('categories.name', 'products.*')
            ->where('categories.id', '=', DB::raw('products.category'))
            ->paginate(50);
        return view('admin.product.index', compact('products'));
    }

    public function dashboard()
    {
        $category = Category::count();
        $product = Product::count();
        return view('admin.dashboard.dashboard', compact('category', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $request->validate([
            'image' => 'required',
            'image.*' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        $file = $request->file('image');
        $filename = time() . "." . $file->getClientOriginalExtension();
        $file->move(public_path('product'), $filename);



        $product = new Product();
        $product->modelno = $request->modelno;
        $product->image = $filename;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->mrp = $request->mrp;
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->vendor = $request->vendor;


        $product->save();



        return redirect()->back()->with('message', "store successfully");
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
        return view('admin.product.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $id = $request->id;


        $product = product::find($id);

        $product->modelno = $request->modelno;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('product'), $filename);


            $product->image = $filename;
        }
        $product->size = $request->size;
        $product->color = $request->color;
        $product->mrp = $request->mrp;
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->vendor = $request->vendor;

        $product->save();

        return redirect()->back()->with('message', "update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message', "delete Successfully");
    }

    public function bulkImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls|max:5240',
        ]);


        $file = $request->file('file');


        $rows = array_map('str_getcsv', file($file));
        // dd($rows);


        foreach (array_slice($rows, 1) as $row) {  // Skip header row
            Product::create([
                'modelno' => $row[0],
                'size' => $row[1],
                'color' => $row[2],
                'mrp' => $row[3],
                'stock' => $row[4],
                'category' => $row[5],
                'vendorsku' => $row[6],
            ]);
        }

        return redirect()->route('product.index')->with("message", 'Import successful');
    }
}
