<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\materials;
use App\Http\Requests\StoretasksRequest;
use App\Http\Requests\UpdatetasksRequest;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cid)
    {
        return view('project-task')->with(['cid'=>$cid]);

    }

    public function viewTask($tid)
    {
        $task = tasks::where('id',$tid)->first();
        $materials = materials::select('id','name','measurement_unit')->get();
        return view('task')->with(['task'=>$task,'materials'=>$materials]);

    }

    public function addWorkers(Request $request)
    {
        foreach($request->worker as $key=>$staff){

            task_workers::create([
                'staff_id'=>$request->staff,
                'amount_paid' => $request->amountpaid[$key],
                'dated' => $request->dated,
                'task_id'=>$request->task_id
            ]);
            return view('task')->with(['task'=>$task,'materials'=>$materials]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretasksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretasksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetasksRequest  $request
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetasksRequest $request, tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(tasks $tasks)
    {
        //
    }
}
