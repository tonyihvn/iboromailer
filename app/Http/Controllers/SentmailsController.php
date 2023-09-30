<?php

namespace App\Http\Controllers;

use App\Models\sentmails;
use App\Http\Requests\StoresentmailsRequest;
use App\Http\Requests\UpdatesentmailsRequest;

class SentmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sentmails = sentmails::all();
        return view('sentmails')->with(['sentmails'=>$sentmails]);
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
     * @param  \App\Http\Requests\StoresentmailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresentmailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sentmails  $sentmails
     * @return \Illuminate\Http\Response
     */
    public function show(sentmails $sentmails)
    {
        //
    }

    public function mail($mid)
    {
        $mail = sentmails::where('id',$mid)->first();
        return view('mail')->with(['mail'=>$mail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sentmails  $sentmails
     * @return \Illuminate\Http\Response
     */
    public function edit(sentmails $sentmails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesentmailsRequest  $request
     * @param  \App\Models\sentmails  $sentmails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesentmailsRequest $request, sentmails $sentmails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sentmails  $sentmails
     * @return \Illuminate\Http\Response
     */
    public function destroy(sentmails $sentmails)
    {
        //
    }
}
