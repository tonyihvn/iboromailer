<?php

namespace App\Http\Controllers;

use App\Models\postevents;
use App\Http\Requests\StoreposteventsRequest;
use App\Http\Requests\UpdateposteventsRequest;

class PosteventsController extends Controller
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
     * @param  \App\Http\Requests\StoreposteventsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreposteventsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\postevents  $postevents
     * @return \Illuminate\Http\Response
     */
    public function show(postevents $postevents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\postevents  $postevents
     * @return \Illuminate\Http\Response
     */
    public function edit(postevents $postevents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateposteventsRequest  $request
     * @param  \App\Models\postevents  $postevents
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateposteventsRequest $request, postevents $postevents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\postevents  $postevents
     * @return \Illuminate\Http\Response
     */
    public function destroy(postevents $postevents)
    {
        //
    }
}
