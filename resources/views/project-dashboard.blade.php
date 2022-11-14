@extends('layouts.template')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Project Dashboard</h1>
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

<div class="card card-widget widget-user">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-user-header text-white" style="background: url('../dist/img/photo1.png') center center; height: 250px;">
    <h1 class="text-right">{{$project->title}}</h1>
    <h5 class="widget-user-desc text-right"><i class="nav-icon fas fa-map-marker-alt"></i> {{$project->location}}</h5>
  </div>
  <div class="widget-user-image">
    <img class="img-circle" src="../dist/img/user3-128x128.jpg" alt="User Avatar">
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col-sm-4 border-right">
        <div class="description-block">
          <h5 class="description-header">{{$project->milestones->count()}}</h5>
          <span class="description-text">MILESTONES</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-4 border-right">
        <div class="description-block">
          <h5 class="description-header">{{$project->milestones->where('status','Completed')->count()}}</h5>
          <span class="description-text">COMPLETED MILESTONES</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-4">
        <div class="description-block">
          <h5 class="description-header">35</h5>
          <span class="description-text">TOTAL EXPENDITURE</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-3">

        <div class="card">
          <img class="card-img-top" src="../dist/img/user3-128x128.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title"><b>{{$project->client->name}}</b></h4>

            <p class="card-text"><i class="nav-icon fas fa-map-marker-alt"></i>  {{$project->client->address}}</p>

            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center active">
                Project Status
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Start Date
                <span class="badge badge-primary badge-pill">{{$project->start_date}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center disabled">
                Estimated Duration
                <span class="badge badge-danger badge-pill">{{$project->estimated_duration}}</span>
              </li>

              <li class="list-group-item d-flex justify-content-between align-items-center disabled">
                % Completion:
                <span class="badge badge-secondary badge-pill"></span>
              </li>

              <li class="list-group-item d-flex justify-content-between align-items-center disabled">
                Project Status
                <span class="badge badge-warning badge-pill">{{$project->status}}</span>
              </li>
            </ul>

            <hr>

            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active">Menu </a>
              <a href="/project/{{$project->id}}/transactions"  class="list-group-item list-group-item-action">Transactions</a>
              <a href="/project/{{$project->id}}/materials"  class="list-group-item list-group-item-action">Materials Used</a>
              <a href="/project/{{$project->id}}/workers"  class="list-group-item list-group-item-action">Workers</a>
              <a href="/project/{{$project->id}}/reports"  class="list-group-item list-group-item-action">Reports</a>
              <a href="/project/{{$project->id}}/tasks"  class="list-group-item list-group-item-action">Tasks</a>
              <a href="/project/{{$project->id}}/milestones"  class="list-group-item list-group-item-action">MileStones</a>

            </div>
          </div>
        </div>

      </div>
      <div class="col-md-9">
        <div class="row">
           <h4>Project Description</h4>
          <p>{!!$project->details!!}</p>

        </div>
        <hr>

        <div class="row">

          <div id="carouselId" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img src="../dist/img/user3-128x128.jpg"alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>Title</h3>
                <p>Description</p>
              </div>
            </div>
            <div class="carousel-item">
              <img data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>Title</h3>
                <p>Description</p>
              </div>
            </div>
            <div class="carousel-item">
              <img data-src="holder.js/900x500/auto/#666:#444/text:Third slide" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>Title</h3>
                <p>Description</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-md-6">

            <div class="list-group">
              <a href="{{url('new-milestone/'.$project->id)}}" class="list-group-item list-group-item-action active">Milestones <span class="btn btn-default"  style="float: right;">Add New</span></a>

              @foreach ($project->milestones as $pm)

              <a href="{{url('milestone/'.$pm->id)}}" class="list-group-item list-group-item-action">{{$pm->title}}</a>


              @endforeach
            </div>

          </div>
          <div class="col-md-6">
            <div class="list-group">
              <a href="{{url('add-file')}}" class="list-group-item list-group-item-action active">Project Files <span class="btn btn-default" style="float: right;">New File</span></a>
              @foreach ($project->project_files as $ft)

                  <a href="{{url('file/'.$ft->id)}}" class="list-group-item list-group-item-action">{{$ft->file_title}}</a>

              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
