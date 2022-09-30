@extends('layouts.template')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Member Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<style>
  .center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  thead{
    background-color: rgb(59, 141, 222);
    color: white;
  }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  @if (Auth()->user()->status=="InActive")
                      <span style="color: red"><i class="fa fa-info"></i> This Account is InActive. Please promote a link to activate</span>
                  @else
                      Hi, {{Auth()->user()->name}}
                  @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="center">
                    <button class="btn btn-lg btn-primary"><i class="fa fa-microphone"></i> Promote a Link</button>
                    </div>
                    <hr>

                    <div class="panel-body">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>Link</th>
                                  <th>Views</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>

                                  <tr>
                                      <td>gdhjd</td>
                                      <td>gdfs</td>
                                      <td>hgdfhshj</td>

                                  </tr>



                          </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
