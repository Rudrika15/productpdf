<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Models\Product;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function bulkcreate()
    {
        return view('admin.product.bulkcreate');
    }
    public function index(Request $req)
    {
        $category =  Category::all();


        if ($req->category) {
            $products = DB::table('categories')
                ->crossJoin('products')
                ->select('categories.name', 'products.*')
                ->where('products.category', $req->category)
                ->where('categories.id', '=', DB::raw('products.category'))
                ->paginate(50);
        } else {
            $products = DB::table('categories')
                ->crossJoin('products')
                ->select('categories.name', 'products.*')
                ->where('categories.id', '=', DB::raw('products.category'))
                ->paginate(50);
        }
        return view('admin.product.index', compact('products', 'category'));
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
            'modelno' => 'required|unique:products,modelno',
            'image' => 'required|url',

        ]);

        // $file = $request->file('image');
        // $filename = time() . "." . $file->getClientOriginalExtension();
        // $file->move(public_path('product'), $filename);



        $product = new Product();
        $product->modelno = $request->modelno;
        $product->image = $request->image;
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
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = time() . "." . $file->getClientOriginalExtension();
        //     $file->move(public_path('product'), $filename);


        //     $product->image = $filename;
        // }
        $product->image = $request->image;
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


    public function generatePDF(Request $request)
    {
        ini_set('max_execution_time', 0);
        $request->validate([
            'category' => 'required',
            'type' => 'required',
        ]);

        // Fetch category and its related products
        $category = Category::findOrFail($request->category);
        $products = Product::where('category', $request->category)->get();

        // Prepare data for PDF
        $data = [
            'category_name' => $category->name,
            'products' => $products,
            'date' => now()->format('Y-m-d'),
        ];

        if ($request->type == 'pdf') {

            $pdf = Pdf::loadView('admin.product.pdf_template', $data);
            $pdf->setOptions(['isRemoteEnabled' => true]);

            return $pdf->download('category_products.pdf');
        } else {
            return Excel::download(new ProductExport($request), 'category_products.xlsx');
        }
    }
}
