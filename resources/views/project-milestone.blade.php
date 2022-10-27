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
    <h4 class="card-title">New Project Milestone</h4>
  </div>
  <div class="card-body">
    <form action="{{route('projects.store')}}" method="post">
      <input type="hidden" name="client_id" value="{{$cid}}">

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

          <div class="form-group col-md-12">
            <label for="details">Duration</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
            </div>
            <small id="Milestone_details" class="form-text text-muted">Duration of the Milestone</small>
          </div>

          <div class="form-group">
            <label>Date masks:</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
            </div>
            <!-- /.input group -->
          </div>

          <div class="form-group col-md-12">

          </div>
    </form>
  </div>
</div>
@endsection
