<?php

namespace App\Http\Controllers;

use App\Models\businesses;
use App\Http\Requests\StorebusinessesRequest;
use App\Http\Requests\UpdatebusinessesRequest;

class BusinessesController extends Controller
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
     * @param  \App\Http\Requests\StorebusinessesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebusinessesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\businesses  $businesses
     * @return \Illuminate\Http\Response
     */
    public function show(businesses $businesses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\businesses  $businesses
     * @return \Illuminate\Http\Response
     */
    public function edit(businesses $businesses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebusinessesRequest  $request
     * @param  \App\Models\businesses  $businesses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebusinessesRequest $request, businesses $businesses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\businesses  $businesses
     * @return \Illuminate\Http\Response
     */
    public function destroy(businesses $businesses)
    {
        //
    }
}
