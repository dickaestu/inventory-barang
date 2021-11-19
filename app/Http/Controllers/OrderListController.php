<?php

namespace App\Http\Controllers;

use App\Model\OrderList;
use App\Model\ProductList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

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
            'quantity'=>['required','numeric','min:0']
        ]);

        $product_list = ProductList::findOrFail($request->product_list_id);
        if($request->quantity > $product_list->quantity){
            return redirect()->back()->with('warning','This product only have '.$product_list->quantity. ' quantity');
        }

        $data = $request->all();
        $data['order_time'] = Carbon::now()->format('Y-m-d');
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

    public function export()
    {
        $items = OrderList::all();
        $pdf = PDF::loadView('exports.order-list', ['items' => $items])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function exportByFilter(Request $request)
    {
        
        $startDate =  $request->startDate;
        $endDate   = $request->endDate;
        $items = OrderList::whereBetween('created_at', [$startDate, $endDate])->get();
        $pdf = PDF::loadView('exports.order-list-filter', [
            'items' => $items,
            'startDate' => $startDate,
            'endDate' => $endDate
        ])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

}
