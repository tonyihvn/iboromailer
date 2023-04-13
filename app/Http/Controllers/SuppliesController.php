<?php

namespace App\Http\Controllers;

use App\Models\supplies;
use App\Models\book_stock;

use Illuminate\Http\Request;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoresuppliesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        supplies::Create([
            'book_id'=>$request->book_id,
            'quantity_supplied'=>$request->quantity_supplied,
            'date_supplied'=>$request->date_supplied,
            'batch_no'=>$request->batch_no,
            'supplier_id'=>$request->supplier_id,
            'school_id'=>Auth()->user()->school_id
        ]);

        book_stock::where('book_id', $request->book_id)->increment('quantity', $request->quantity_supplied);

        $message = 'The supply saved successfully';

        return redirect()->back()->with(['message'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function show(supplies $supplies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function edit(supplies $supplies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesuppliesRequest  $request
     * @param  \App\Models\supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesuppliesRequest $request, supplies $supplies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplies $supplies)
    {
        //
    }
}
