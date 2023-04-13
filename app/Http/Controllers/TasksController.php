<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\materials;
use App\Http\Requests\StoretasksRequest;
use App\Http\Requests\UpdatetasksRequest;
use Illuminate\Http\Request;
use App\Models\task_workers;
use App\Models\categories;

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

    // General Task
    public function newTask()
    {
        $categories = categories::where('school_id',Auth()->user()->school_id)->get();
        return view('new-task')->with(['categories'=>$categories]);

    }

    // Save General Task
    public function saveTask(Request $request)
    {
        tasks::updateOrCreate(['id'=>$request->tid],[
            'subject'=>$request->subject,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'details'=>$request->details,
            'assigned_to'=>$request->assigned_to,
            'category'=>$request->category,
            'status'=>$request->status,
            'created_by'=>Auth()->user()->id,
            'school_id'=>Auth()->user()->school_id

        ]);

        $message = "Task created successfully!";

        return redirect()->back()->with(['message'=>$message]);

    }

    public function viewTask($tid)
    {
        $task = tasks::where('id',$tid)->first();
        return view('task')->with(['task'=>$task]);

    }

    public function change_task_status(Request $request)
    {
        $task = tasks::where('id',$request->task_id)->first();
        $task->status=$request->change_status;
        $task->save();

        $message = "Task Status Changed to ".$request->change_status;

        return redirect()->back()->with(['message'=>$message]);

    }


    public function completetask($id)
    {
        $task = tasks::where('id',$id)->first();
        $task->status = 'Completed';
        $task->save();

        $message = 'The task has been updated!';

        return redirect()->route('tasks')->with(['message'=>$message]);
    }

    public function inprogresstask($id)
    {
        $task = tasks::where('id',$id)->first();
        $task->status = 'In Progress';
        $task->save();

        $message = 'The task has been updated!';

        return redirect()->route('tasks')->with(['message'=>$message]);
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
    public function destroy($task_id)
    {
        tasks::find($task_id)->delete();
        $message = "The selected task has been deleted";

        return redirect()->back()->with(['message'=>$message]);
    }
}
