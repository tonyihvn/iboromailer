<?php

namespace App\Http\Controllers;

use App\Models\material_supplies;
use App\Http\Requests\Storematerial_suppliesRequest;
use App\Http\Requests\Updatematerial_suppliesRequest;

class MaterialSuppliesController extends Controller
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
     * @param  \App\Http\Requests\Storematerial_suppliesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storematerial_suppliesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\material_supplies  $material_supplies
     * @return \Illuminate\Http\Response
     */
    public function show(material_supplies $material_supplies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\material_supplies  $material_supplies
     * @return \Illuminate\Http\Response
     */
    public function edit(material_supplies $material_supplies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatematerial_suppliesRequest  $request
     * @param  \App\Models\material_supplies  $material_supplies
     * @return \Illuminate\Http\Response
     */
    public function update(Updatematerial_suppliesRequest $request, material_supplies $material_supplies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\material_supplies  $material_supplies
     * @return \Illuminate\Http\Response
     */
    public function destroy(material_supplies $material_supplies)
    {
        //
    }
}
