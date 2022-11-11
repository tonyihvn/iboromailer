<?php

namespace App\Http\Controllers;

use App\Models\material_checkouts;
use App\Http\Requests\Storematerial_checkoutsRequest;
use App\Http\Requests\Updatematerial_checkoutsRequest;

class MaterialCheckoutsController extends Controller
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
     * @param  \App\Http\Requests\Storematerial_checkoutsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storematerial_checkoutsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\material_checkouts  $material_checkouts
     * @return \Illuminate\Http\Response
     */
    public function show(material_checkouts $material_checkouts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\material_checkouts  $material_checkouts
     * @return \Illuminate\Http\Response
     */
    public function edit(material_checkouts $material_checkouts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatematerial_checkoutsRequest  $request
     * @param  \App\Models\material_checkouts  $material_checkouts
     * @return \Illuminate\Http\Response
     */
    public function update(Updatematerial_checkoutsRequest $request, material_checkouts $material_checkouts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\material_checkouts  $material_checkouts
     * @return \Illuminate\Http\Response
     */
    public function destroy(material_checkouts $material_checkouts)
    {
        //
    }
}
