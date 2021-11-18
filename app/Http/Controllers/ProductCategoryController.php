<?php

namespace App\Http\Controllers;

use App\Model\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $items = ProductCategory::all();
        return view('pages.product-category.index', compact('items'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('pages.product-category.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>['required','string','max:70'],
        ],[
            'category.required'=> 'Category name is required',
        ]);

        $data = $request->all();

        ProductCategory::create($data);

        return redirect()->route('product-category.index')->with('success','Data has been created');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $item = ProductCategory::findOrFail($id);

        return view('pages.product-category.edit', compact('item'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category'=>['required','string','max:70'],
        ],[
            'category.required'=> 'Category name is required',
        ]);

        $data = $request->all();
        $item = ProductCategory::findOrFail($id);

        $item->update($data);


        return redirect()->route('product-category.index')->with('success','Data has been updated');
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $item = ProductCategory::findOrFail($id);

        $item->delete();

        return redirect()->route('product-category.index')->with('success','Data has been deleted');
    }
}
