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
    <form action="{{route('project-task')}}" method="post">

          <div class="form-group col-md-12">
            <label for="title">Subject</label>
            <input type="text"
              class="form-control" name="subject" id="subject" aria-describedby="subject" placeholder="Enter a Subject">
            <small id="subject" class="form-text text-muted">The subject or title of the task</small>
          </div>

          <div class="form-group col-md-12">
            <label for="details">Task Details</label>
            <input type="text"
              class="form-control" name="details" id="details" aria-describedby="Task Details" placeholder="Enter Task Details">
            <small id="task_details" class="form-text text-muted">A Detailed infomation about the task being entered</small>
          </div>

          <div class="form-group col-md-12">
            <label for="category">Task Category</label>
            <input type="text"
              class="form-control" name="category" id="category" aria-describedby="Task Category" placeholder="Enter Task Category">
            <label for="status">Status</label>
            <input type="text"
              class="form-control" name="status" id="status" aria-describedby="Status">
          </div>

          <div class="form-group col-md-12">
            <label for="details">Duration</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" name="start_date" id="start_date" inputmode="numeric" placeholder="Enter start date">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" name="end_date" id="end_date" inputmode="numeric" placeholder="Enter end date">
            </div>
            <small id="Task_details" class="form-text text-muted">Duration of the Task</small>
          </div>

          <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
    </form>
  </div>
</div>
@endsection
