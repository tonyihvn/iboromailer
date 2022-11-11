<?php

namespace App\Http\Controllers;

use App\Models\material_damages;
use App\Http\Requests\Storematerial_damagesRequest;
use App\Http\Requests\Updatematerial_damagesRequest;

class MaterialDamagesController extends Controller
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
     * @param  \App\Http\Requests\Storematerial_damagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storematerial_damagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\material_damages  $material_damages
     * @return \Illuminate\Http\Response
     */
    public function show(material_damages $material_damages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\material_damages  $material_damages
     * @return \Illuminate\Http\Response
     */
    public function edit(material_damages $material_damages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatematerial_damagesRequest  $request
     * @param  \App\Models\material_damages  $material_damages
     * @return \Illuminate\Http\Response
     */
    public function update(Updatematerial_damagesRequest $request, material_damages $material_damages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\material_damages  $material_damages
     * @return \Illuminate\Http\Response
     */
    public function destroy(material_damages $material_damages)
    {
        //
    }
}
