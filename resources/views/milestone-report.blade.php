@extends('layouts.template')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Milestones Report</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Report</a></li>
          <li class="breadcrumb-item active">New Milestones Report</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="card card-primary">
  <div class="card-header">
    <h4 class="card-title">Milestones Report Form</h4>
  </div>
  <div class="card-body">
    <form action="{{route('milestone-report')}}" method="post">
      <input type="hidden" name="client_id" value="{{$cid}}">

          <div class="form-group col-md-12">
            <label for="subject">Report Subject</label>
            <input type="text"
              class="form-control" name="subject" id="subject" aria-describedby="report-subject" placeholder="Enter a Subject">
            <small id="report_subject" class="form-text text-muted">The subject of the milestone report</small>
          </div>

          <div class="form-group col-md-12">
            <label for="details">Report Details</label>
            <input type="text"
              class="form-control" name="details" id="details" aria-describedby="details" placeholder="Enter the details">
            <small id="details" class="form-text text-muted">Details of the milestone report.</small>
          </div>

          <div class="form-group col-md-12">
            <label for="approval">Approval</label>
            <input type="text"
              class="form-control" name="approval" id="approval" aria-describedby="approval" placeholder="Approval By">
            <small id="approval" class="form-text text-muted">Who gave the approval of the milestone report.</small>
          </div>

          <div class="form-group col-md-12">
            <label for="recorded_by">Recorded by</label>
            <input type="text"
              class="form-control" name="recorded_by" id="recorded_by" aria-describedby="recorded_by" placeholder="Recorded By">
            <small id="recorded_by" class="form-text text-muted">Who is entering the milestone report.</small>
          </div>

          <div class="form-group col-md-12">
            <label for="category">Category</label>
            <input type="text"
              class="form-control" name="category" id="category" aria-describedby="category" placeholder="category">
            <small id="category" class="form-text text-muted"></small>
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
            <small id="Task_details" class="form-text text-muted">Duration of the report</small>
          </div>

          <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
    </form>
  </div>
</div>
@endsection
