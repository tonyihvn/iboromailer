<?php

namespace App\Http\Controllers;

use App\Models\material_stock;
use App\Http\Requests\Storematerial_stockRequest;
use App\Http\Requests\Updatematerial_stockRequest;

class MaterialStockController extends Controller
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
     * @param  \App\Http\Requests\Storematerial_stockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storematerial_stockRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\material_stock  $material_stock
     * @return \Illuminate\Http\Response
     */
    public function show(material_stock $material_stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\material_stock  $material_stock
     * @return \Illuminate\Http\Response
     */
    public function edit(material_stock $material_stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatematerial_stockRequest  $request
     * @param  \App\Models\material_stock  $material_stock
     * @return \Illuminate\Http\Response
     */
    public function update(Updatematerial_stockRequest $request, material_stock $material_stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\material_stock  $material_stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(material_stock $material_stock)
    {
        //
    }
}
