@extends('layouts.template')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Project Milestone</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Project Milestones</a></li>
          <li class="breadcrumb-item active">New Milestone</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="card card-primary">
  <div class="card-header">
    <h4 class="card-title">Project Milestone</h4>
  </div>
  <div class="card-body">
    <form action="{{route('savemilestone')}}" method="post">
      <input type="hidden" name="project_id" value="{{$project_id}}">
      <input type="hidden" name="business_id" value="{{Auth()->user()->business_id}}">

          @csrf
          <div class="form-group col-md-12">
            <label for="title">Milestone Name</label>
            <input type="text"
              class="form-control" name="title" id="title" aria-describedby="milestone_title" placeholder="Enter a Milestone Title">
            <small id="milestone_title" class="form-text text-muted">A Descriptive Name of the Milestone</small>
          </div>

          <div class="form-group col-md-12">
            <label for="details">Milestone Details</label>
            <input type="text"
              class="form-control" name="details" id="details" aria-describedby="Milestone Details" placeholder="Enter Milestone Details">
            <small id="Milestone_details" class="form-text text-muted">A Detailed infomation about the milestone being entered</small>
          </div>

          <div class="form-group row">


            <div class="col-md-4">
              <label>Start Date:</label>
                <div class="input-group date" id="start_date_activator" data-target-input="nearest">
                    <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#start_date_activator">
                    <div class="input-group-append" data-target="#start_date_activator" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
              <label>End Date:</label>
                <div class="input-group date" id="end_date_activator" data-target-input="nearest">
                    <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#end_date_activator">
                    <div class="input-group-append" data-target="#end_date_activator" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <label for="estimated_cost">Estimated Cost</label>
                <input type="number" step="0.01"
                  class="form-control" name="estimated_cost" id="estimated_cost" placeholder="Estimated Cost">
            </div>

          </div>

          <div class="form-group row">
            <div class="col-md-4">
                <label>Assigned To:</label>
                <select name="assigned_to" class="form-control select2" >
                  @foreach ($staff as $st)
                  <option data-select2-id="{{$st->id}}" value="{{$st->id}}">{{$st->name}}</option>
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
