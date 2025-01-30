<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $item = Item::all();
        return view('item.index',compact('item'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'img'=>'required|array',
            'img.*'=>'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        $allimages=[];
        foreach($request->file('img') as $file){
            // $file =$request->file('img');
            $filename =$file->getClientOriginalName();

            // $filename = time().'.'.$extension;
            $path ='public/images';
            $file->move($path,$filename);
            $allimages[]=$filename;

            $item = new Item();
            $item->item_name =$request->item_name;
            $item->code=$request->code;
            $item->price =$request->price;
            $item->img=$filename;
            $item->Save();
        }
        return redirect()->back()->with('message',"stored successfully");




    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $items = item::find($id);
        return view('item.edit',compact('items'));
        return redirect()->back()->with('message',"update successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $item = Item::find($id);
        $item->item_name =$request->item_name;
        $item->code=$request->code;
        $item->price =$request->price;
        $item->img=$request->img;
        $item->Save();
        return redirect()->back()->with('message',"update successfully");


}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item  = Item::find($id);
        $item->delete();
        return redirect()->back()->with('message',"aapka record delete ho gya");



    }
}
