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

    @isset($task->milestone_id)
      <h5><i>As part of Milestone: </i>{{$task->milestone->title}}</h5>
    @endisset

    @isset($task->project_id)
      <h5><i>Project Name: </i>{{$task->project->title}}, <i>Client: </i>{{$task->project->client->name}}</h5>
    @endisset
    Status: <span class="badge badge-pill badge-primary">{{$task->status}}</span>
    <hr>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        {!!$task->details!!}
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

<div class="row">
  <div class="col-md-6">
    <div class=" card card-primary card-outline">
      <div class="widget-heading">Add Workers</div>
      <form action="{{route('addWorkers')}}">
        <input type="hidden" name="task_id" value="{{$task->id}}">
        <table class="card-body table  responsive-table" id="products">
          <thead>
              <tr style="color: ">
                  <th>Select</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Amount Paid</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($staff as $wk)

                  <tr>
                      <td><input type="checkbox" name="worker[]" value="{{$wk->id}}"></td>
                      <td>{{$wk->name}}</td>
                      <td>{{$wk->phone_number}}</td>
                      <td><input type="number" name="amountpaid[]" step="0.01"></td>
                  </tr>
              @endforeach

          </tbody>
        </table>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card card-primary card-outline">
      <div class="widget-heading">Add Materials Used</div>
      <form action="{{route('addMaterialsUsed')}}">
        <input type="hidden" name="task_id" value="{{$task->id}}">
        <table class="card-body table  responsive-table" id="products">
          <thead>
              <tr style="color: ">
                  <th>Select</th>
                  <th>Material Name</th>
                  <th>Unit of Measurement</th>
                  <th>Quantity Used</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($materials as $mt)

                  <tr>
                      <td><input type="checkbox" name="materialname[]" value="{{$mt->id}}"></td>
                      <td>{{$mt->name}}</td>
                      <td>{{$mt->measurement_unit}}</td>
                      <td><input type="number" name="quantityused[]" step="0.01"></td>
                  </tr>
              @endforeach
          </tbody>
        </table>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>




@endsection
