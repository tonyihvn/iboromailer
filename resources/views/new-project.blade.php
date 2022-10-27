@extends('layouts.template')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">New Project</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Projects</a></li>
          <li class="breadcrumb-item active">New Project</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="card card-primary">
  <div class="card-header">
    <h4 class="card-title">New Project Form</h4>
  </div>
  <div class="card-body">
    <form action="{{route('projects.store')}}" method="post">
      <input type="hidden" name="client_id" value="{{$cid}}">

          <div class="form-group col-md-12">
            <label for="title">Project Name</label>
            <input type="text"
              class="form-control" name="title" id="title" aria-describedby="project_title" placeholder="Enter a Project Title">
            <small id="project_title" class="form-text text-muted">A Descriptive Name of the Project e.g. 2 Bedroom Bungalow at Guzape Hills</small>
          </div>

          <div class="form-group col-md-12">
            <label for="location">Project Location</label>
            <input type="text"
              class="form-control" name="location" id="location" aria-describedby="project_location" placeholder="Enter the Location">
            <small id="project_location" class="form-text text-muted">Address / Physical Location of the Project</small>
          </div>

          <div class="form-group col-md-12">

          </div>
    </form>
  </div>
</div>
@endsection
