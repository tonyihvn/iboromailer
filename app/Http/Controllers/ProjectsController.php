<?php

namespace App\Http\Controllers;

use App\Models\projects;
use App\Http\Requests\StoreprojectsRequest;
use App\Http\Requests\UpdateprojectsRequest;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = projects::all();
        return view('projects')->with(['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cid)
    {
        return view('new-project')->with(['client_id'=>$cid]);

    }

    public function newProject()
    {
        return view('new-project');

    }

    public function clientProjects($cid)
    {
        $clientprojects = projects::where('client_id',$cid)->get();
        return view('projects')->with(['projects'=>$clientprojects]);

    }

    public function projectDashboard($pid)
    {
        $project = projects::where('id',$pid)->first();
        return view('project-dashboard')->with(['project'=>$project]);

    }

    public function editProject($pid)
    {
        $project = projects::where('id',$pid)->first();
        return view('new-project')->with(['project'=>$project]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprojectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->product_id!=''){
            $outcome = "modified";
        }else{
            $outcome = "created";
        }


        products::updateOrCreate(['id'=>$request->project_id],[
            'title'=>$request->title,
            'price'=>$request->price,
            'supplier_id'=>$request->supplier_id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'detail'=>$request->detail,
            'terms'=>$request->terms,
            'status'=>$request->status,
            'business_id'=>Auth()->user()->business_id
        ]);

        $message = 'The product has been '.$outcome.' successfully';

        return redirect()->route('products')->with(['message'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprojectsRequest  $request
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprojectsRequest $request, projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }
}
