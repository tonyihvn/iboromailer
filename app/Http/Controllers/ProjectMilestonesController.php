<?php

namespace App\Http\Controllers;

use App\Models\project_milestones;
use App\Http\Requests\Storeproject_milestonesRequest;
use App\Http\Requests\Updateproject_milestonesRequest;

class ProjectMilestonesController extends Controller
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
    public function create($pid)
    {
        return view('project-milestone')->with(['project_id'=>$pid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeproject_milestonesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeproject_milestonesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project_milestones  $project_milestones
     * @return \Illuminate\Http\Response
     */
    public function show(project_milestones $project_milestones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project_milestones  $project_milestones
     * @return \Illuminate\Http\Response
     */
    public function edit(project_milestones $project_milestones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateproject_milestonesRequest  $request
     * @param  \App\Models\project_milestones  $project_milestones
     * @return \Illuminate\Http\Response
     */
    public function update(Updateproject_milestonesRequest $request, project_milestones $project_milestones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project_milestones  $project_milestones
     * @return \Illuminate\Http\Response
     */
    public function destroy(project_milestones $project_milestones)
    {
        //
    }
}
