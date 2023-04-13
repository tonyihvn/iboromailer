<?php

namespace App\Http\Controllers;

use App\Models\locations;
use App\Http\Requests\StorelocationsRequest;
use App\Http\Requests\UpdatelocationsRequest;

class LocationsController extends Controller
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
     * @param  \App\Http\Requests\StorelocationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelocationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function show(locations $locations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function edit(locations $locations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelocationsRequest  $request
     * @param  \App\Models\locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelocationsRequest $request, locations $locations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy(locations $locations)
    {
        //
    }
}
