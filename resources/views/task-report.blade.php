@extends('layouts.template')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Task</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Task</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="card card-widget">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-header" style="padding: 10px;">
    <h1>{{$task->subject}}</h1>

    @isset($task->task_id)
    <h5><i>Task: </i>{{$task->task->subject}}, <i>Client: </i>{{$task->task->project->name}}</h5>
  @endisset

    @isset($task->milestone_id)
      <h5><i>As part of Milestone: </i>{{$task->milestone->title}}, {{$task->milestone->project->title}}</h5>
    @endisset

    <div class="row">
      <div class="col-md-2">
        Category: <span class="badge badge-pill badge-primary">{{$task->category}}</span>
      </div>



      <div class="col-md-2">
        <form action="{{route('change_task_report_status')}}" method="POST">
          @csrf
          <input type="hidden" name="report_id" value="{{$task->id}}">
          <div class="form-group">
            <label for="change_approval">Change Approval</label>
            <select name="change_approval" id="change_approval" class="form-control" onchange="this.form.submit()">
              <option value="{{$task->approval}}" selected>{{$task->approval}}</option>
              <option value="Approved">Approved</option>
              <option value="Not Approved">Not Approved</option>
            </select>
          </div>
        </form>
      </div>
    </div>


    <hr>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <h5>Details</h5>
        {!!$task->details!!}
      </div>
      <div class="col-md-6">
        <h5>Files</h5>

      </div>
    </div>
  </div>
</div>

@endsection
