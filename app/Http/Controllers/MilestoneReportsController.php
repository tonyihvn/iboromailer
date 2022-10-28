<?php

namespace App\Http\Controllers;

use App\Models\milestone_reports;
use App\Http\Requests\Storemilestone_reportsRequest;
use App\Http\Requests\Updatemilestone_reportsRequest;

class MilestoneReportsController extends Controller
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
    public function create($cid)
    {
        return view('milestone-report')->with(['cid'=>$cid]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storemilestone_reportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storemilestone_reportsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\milestone_reports  $milestone_reports
     * @return \Illuminate\Http\Response
     */
    public function show(milestone_reports $milestone_reports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\milestone_reports  $milestone_reports
     * @return \Illuminate\Http\Response
     */
    public function edit(milestone_reports $milestone_reports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemilestone_reportsRequest  $request
     * @param  \App\Models\milestone_reports  $milestone_reports
     * @return \Illuminate\Http\Response
     */
    public function update(Updatemilestone_reportsRequest $request, milestone_reports $milestone_reports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\milestone_reports  $milestone_reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(milestone_reports $milestone_reports)
    {
        //
    }
}
