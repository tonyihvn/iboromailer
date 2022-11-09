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
    @isset($task->project_id)
      <h3>{{$task->project->title}}, {{$task->project->client->name}}</h3>
    @endisset
    Status: <span class="badge badge-pill badge-primary">{{$task->status}}</span>
    <hr>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        {{$task->details}}
      </div>
      <div class="col-md-6">


        <div class="info-box bg-info">
          <span class="info-box-icon"><i class="fa fa-reports"></i></span>

          <div class="info-box-content">

            <div class="progress">
              <div class="progress-bar progress-bar-striped" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              <b>Expected Duration:</b> From: {{$task->start_date}} To: {{$task->end_date}} <hr>
              <b>Staff-in-Charge:</b> {{$task->assignedTo->name}}

            </span>
          </div>
          <!-- /.info-box-content -->
        </div>


        <div class="list-group">

          <a href="{{url('new-task-report/'.$task->id)}}" class="list-group-item list-group-item-action active">Tasks Reports <span class="btn btn-default"  style="float: right;">Add New</span></a>

          @foreach ($task->reports as $tr)
            <div class="list-group-item list-group-item-action"><a href="{{url('task-report/'.$tr->id)}}">{{$tr->title}}</a>
              <div class="btn-group" style="float: right;">
                <a href="#" class="btn btn-xs btn-primary">View</a>
                <a href="#" class="btn btn-xs btn-success">Edit</a>
                <a href="#" class="btn btn-xs btn-danger">Delete</a>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
