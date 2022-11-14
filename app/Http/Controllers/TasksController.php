<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\materials;
use App\Http\Requests\StoretasksRequest;
use App\Http\Requests\UpdatetasksRequest;
use Illuminate\Http\Request;
use App\Models\task_workers;

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

    public function change_task_status(Request $request)
    {
        $task = tasks::where('id',$request->task_id)->first();
        $task->status=$request->change_status;
        $task->save();

        $message = "Task Status Changed to ".$request->change_status;

        return redirect()->back()->with(['message'=>$message]);

    }

    public function addWorkers(Request $request)
    {
        foreach($request->worker as $key=>$worker_id){
            task_workers::create([
                'worker_id'=>$worker_id,
                'amount_paid' => $request->amountpaid[$key],
                'work_date' => $request->work_date,
                'task_id'=>$request->task_id
            ]);

        }

        $message = "Workers added to the task";
        return redirect()->back()->with(['message'=>$message]);
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
