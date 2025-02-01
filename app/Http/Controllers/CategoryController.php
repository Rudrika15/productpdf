<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
return view("admin.category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('message',"store successfully");


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {


        $id = $request->id;
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('message', "update successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect()->back()->with('message',"delete Successfully");


    }
}
