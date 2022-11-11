@extends('layouts.template')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Projects</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Projects</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>


<div class="card">
  <div class="card-body">
    <a href="/addproject" class="btn btn-primary" style="float: right;">Add New</a>

    <table class="table responsive-table" id="products">
        <thead>
            <tr>
                <th width="20">#</th>
                <th>Project Title</th>
                <th>Company Name</th>
                <th>Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $pr)

                <tr
                    @if ($pr->status=="Active")
                        style="background-color: azure !important;"
                    @endif
                >
                    <td>{{$pr->id}}</td>
                    <td>{{$pr->title}}</td>
                    <td>{{$pr->client->company_name}}</td>
                    <td>{{$pr->location}}</td>
                    <td>{{$pr->status}}</td>
                    <td width="90">



                        <div class="btn-group">
                          <a href="/project-dashboard/{{$pr->id}}" class="btn btn-primary btn-sm">Dashboard<i class="lnr lnr-list"></i></a>

                            <a href="/project-milestones/{{$pr->id}}" class="btn btn-danger btn-sm">Milestones<i class="lnr lnr-list"></i></a>

                        </div>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>
  </div>
</div>
@endsection
