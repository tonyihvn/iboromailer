<?php

namespace App\Http\Controllers;

use App\Models\project_files;
use App\Http\Requests\Storeproject_filesRequest;
use App\Http\Requests\Updateproject_filesRequest;

class ProjectFilesController extends Controller
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
     * @param  \App\Http\Requests\Storeproject_filesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeproject_filesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project_files  $project_files
     * @return \Illuminate\Http\Response
     */
    public function show(project_files $project_files)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project_files  $project_files
     * @return \Illuminate\Http\Response
     */
    public function edit(project_files $project_files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateproject_filesRequest  $request
     * @param  \App\Models\project_files  $project_files
     * @return \Illuminate\Http\Response
     */
    public function update(Updateproject_filesRequest $request, project_files $project_files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project_files  $project_files
     * @return \Illuminate\Http\Response
     */
    public function destroy(project_files $project_files)
    {
        //
    }
}
