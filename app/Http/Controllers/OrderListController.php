<?php

namespace App\Http\Controllers;

use App\Model\OrderList;
use App\Model\ProductList;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = OrderList::all();
        return view('pages.order-list.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_lists = ProductList::all();
        return view('pages.order-list.create',compact('product_lists'));
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
            'product_list_id'=>['required'],
            'name' => ['required','string'],
            'phone_number' => ['required','string'],
        ]);

        $data = $request->all();
        OrderList::create($data);

        return redirect()->route('order-list.index')->with('success','Data has been created');
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
        $item = OrderList::findOrFail($id);
        $product_lists = ProductList::all();

        return view('pages.order-list.edit',compact('item','product_lists'));
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
            'product_list_id'=>['required'],
            'name' => ['required','string'],
            'phone_number' => ['required','string'],
        ]);

        $data = $request->all();
        $item = OrderList::findOrFail($id);

        $item->update($data);
        return redirect()->route('order-list.index')->with('success','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = OrderList::findOrFail($id);

        $item->delete();
        return redirect()->route('order-list.index')->with('success','Data has been deleted');

    }
}
