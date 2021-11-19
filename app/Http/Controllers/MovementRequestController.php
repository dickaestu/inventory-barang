<?php

namespace App\Http\Controllers;

use App\Model\OrderList;
use App\Model\ProductList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class MovementRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = OrderList::where('status','!=','rejected')->get();
        return view('pages.movement-request.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $item = OrderList::findOrFail($id);
        $product_list = ProductList::findOrFail($item->product_list_id);
         
        if($request->status == 'accepted'){
            $product_list->quantity -= $item->quantity;
            $product_list->save();

            $item->update([
                'status'=>$request->status,
                'approved_at'=>Carbon::now()
            ]);
        } else {
            $item->update([
                'status'=>$request->status
            ]);
        }

        return redirect()->route('movement-request.index')->with('success','Successfully changed status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printInvoice($id){
        $item = OrderList::findOrFail($id);
        $pdf = PDF::loadView('exports.print-invoice', ['item' => $item])->setPaper('a4');
        return $pdf->stream();
    }
}
