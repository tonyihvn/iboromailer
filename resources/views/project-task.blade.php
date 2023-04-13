@extends('layouts.template')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Project Task</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">New Project Task</a></li>
                        <li class="breadcrumb-item active">New Task</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">New Task</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('savemilestoneTask') }}" method="post">
                @csrf

                <input type="hidden" name="project_id" value="{{ isset($project_id) ? $project_id : '' }}">
                <input type="hidden" name="milestone_id" value="{{ isset($milestone_id) ? $milestone_id : '' }}">
                <input type="hidden" name="business_id" value="{{ Auth()->user()->business_id }}">
                <input type="hidden" name="category" value="Milestone Task">

                <div class="form-group col-md-12">
                    <label for="title">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" aria-describedby="subject"
                        placeholder="Enter a Subject">
                    <small id="subject" class="form-text text-muted">The subject or title of the task</small>
                </div>

                <div class="form-group col-md-12">
                    <label for="details">Task Details</label>
                    <textarea name="details" id="details" class="wyswygeditor">
              Place <em>some</em> <u>text</u> <strong>here</strong>
            </textarea>

                    <small id="task_details" class="form-text text-muted">A Detailed infomation about the task being
                        entered</small>
                </div>


                <div class="form-group row">


                    <div class="col-md-4">
                        <label>Start Date:</label>
                        <div class="input-group date" id="start_date_activator" data-target-input="nearest">
                            <input type="text" name="start_date" class="form-control datetimepicker-input"
                                data-target="#start_date_activator">
                            <div class="input-group-append" data-target="#start_date_activator"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>End Date:</label>
                        <div class="input-group date" id="end_date_activator" data-target-input="nearest">
                            <input type="text" name="end_date" class="form-control datetimepicker-input"
                                data-target="#end_date_activator">
                            <div class="input-group-append" data-target="#end_date_activator" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="estimated_cost">Expenses Cost (Optional)</label>
                        <input type="number" step="0.01" class="form-control" name="estimated_cost" id="estimated_cost"
                            placeholder="Estimated Cost">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Assigned To:</label>
                        <select name="assigned_to" class="form-control select2">
                            @foreach ($staff as $st)
                                <option data-select2-id="{{ $st->id }}" value="{{ $st->id }}">
                                    {{ $st->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Status:</label>
                        <select name="status" class="form-control">
                            <option value="Upcoming">Upcoming</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                            <option value="Paused">Paused</option>
                            <option value="Terminated">Terminated</option>
                        </select>
                    </div>

                    <div class="col-md-4" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
