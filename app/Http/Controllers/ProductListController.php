<?php

namespace App\Http\Controllers;

use App\Model\ProductCategory;
use App\Model\ProductList;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ProductList::all();
        return view('pages.product-list.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('pages.product-list.create',compact('categories'));
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
            'product_category_id'=>['required'],
            'product_name' => ['required','string'],
            'uom' => ['required','string'],
            'quantity' => ['required','integer']
        ]);

        $data = $request->all();
        ProductList::create($data);
        return redirect()->route('product-list.index')->with('success','Data has been created');
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
        $item = ProductList::findOrFail($id);
        $categories = ProductCategory::all();

        return view('pages.product-list.edit',compact('item','categories'));

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
            'product_category_id'=>['required'],
            'product_name' => ['required','string'],
            'uom' => ['required','string'],
            'quantity' => ['required','integer']
        ]);

        $data = $request->all();
        $item = ProductList::findOrFail($id);
        $item->update($data);
        return redirect()->route('product-list.index')->with('success','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductList::findOrFail($id);

        $item->delete();
        return redirect()->route('product-list.index')->with('success','Data has been deleted');
    }
}
