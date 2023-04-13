<?php

namespace App\Http\Controllers;

use App\Models\access;
use App\Models\book_stock;

use Illuminate\Http\Request;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accesses = access::all();
        return view('checkouts')->with(['accesses'=>$accesses]);

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
     * @param  \App\Http\Requests\StoreaccessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        access::Create([
            'book_id'=>$request->book_id,
            'quantity_checkout'=>$request->quantity_checkout,
            'checkout_date'=>date("Y-m-d"),
            'expected_checkin'=>$request->expected_checkin,
            'penalty'=>$request->penalty,
            'student_id'=>$request->student_id,
            'status'=>$request->status,
            'school_id'=>Auth()->user()->school_id
        ]);

        book_stock::where('book_id', $request->book_id)->decrement('quantity', $request->quantity_checkout);

        $message = 'The checkout saved successfully';

        return redirect()->back()->with(['message'=>$message]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\access  $access
     * @return \Illuminate\Http\Response
     */
    public function show(access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\access  $access
     * @return \Illuminate\Http\Response
     */
    public function edit(access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaccessRequest  $request
     * @param  \App\Models\access  $access
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaccessRequest $request, access $access)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\access  $access
     * @return \Illuminate\Http\Response
     */
    public function destroy(access $access)
    {
        //
    }
}
