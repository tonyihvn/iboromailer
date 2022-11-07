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
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Project Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="card card-widget">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-header" style="padding: 10px;">
    <h1>{{$milestone->title}}</h1>
    <h3>{{$milestone->project->title}}, {{$milestone->project->client->name}}</h3>
    <hr>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        {{$milestone->details}}
      </div>
      <div class="col-md-4">
        <div class="list-group">
          <a href="{{url('milestone-task/'.$milestone->id)}}" class="list-group-item list-group-item-action active">Tasks / ToDo <span class="btn btn-default"  style="float: right;">Add New</span></a>

          @foreach ($milestone->tasks as $mt)

          <a href="{{url('task/'.$mt->id)}}" class="list-group-item list-group-item-action">{{$mt->subject}}</a>


          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
