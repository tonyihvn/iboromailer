@extends('layouts.template')
@php
    $pagetype = 'Dashboard';
@endphp

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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $books->count() }}</h3>

                            <p>Books</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-persons"></i>
                        </div>
                        <a href="{{ url('books') }}" class="small-box-footer">View All Books <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $students->count() }}</h3>

                            <p>Students</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('students') }}" class="small-box-footer">View All <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $checkouts->where('status', 'Checkedout')->count() }}
                            </h3>

                            <p>Book Checkouts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('projects') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $mytasks->where('status', '!=', 'Completed')->count() }}</h3>

                            <p>Tasks & Messages</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('tasks') }}" class="small-box-footer">View all <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <h3>Search For Books</h3>

            <form action="{{ url('searchByISBN') }}" method="post">
                @csrf
                <div class="row" style="align-content: center;">
                    <div class="form-group col-md-4 col-md-offset-2">
                        <input type="text" id="isbn_no" name="isbn_no" value="" placeholder="Search for Books"
                            class="form-control" autofocus>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit" value="Search" class="btn btn-primary">
                    </div>
                </div>
            </form>

            <div id="container" class="row">
                @foreach ($books as $bk)
                    <div class="card col-md-3">
                        <img class="card-img-top" src="{{ asset('public/files/' . $bk->image) }}" alt="Card image"
                            style=" height: 200px;">
                        <div class="card-body" style="text-align: center !important">
                            <h6 style="text-align: center !important"><b>{{ $bk->title }}</b></h6>
                            <p class="card-text"><i>{{ $bk->subtitle }}</i></p>
                            <div class="btn-group">
                                <a href="{{ url('book/' . $bk->id) }}" class="btn btn-xs btn-primary">View Details</a>
                                <a href="{{ url('checkout/' . $bk->id) }}" class="btn btn-xs btn-success">Checkout</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <style>
        body {
            background: #eee;
        }

        .card-box {
            position: relative;
            color: #fff;
            padding: 20px 10px 40px;
            margin: 20px 0px;
        }

        .card-box:hover {
            text-decoration: none;
            color: #f1f1f1;
        }

        .card-box:hover .icon i {
            font-size: 100px;
            transition: 1s;
            -webkit-transition: 1s;
        }

        .card-box .inner {
            padding: 5px 10px 0 10px;
        }

        .card-box h3 {
            font-size: 27px;
            font-weight: bold;
            margin: 0 0 8px 0;
            white-space: nowrap;
            padding: 0;
            text-align: left;
        }

        .card-box p {
            font-size: 15px;
        }

        .card-box .icon {
            position: absolute;
            top: auto;
            bottom: 5px;
            right: 5px;
            z-index: 0;
            font-size: 72px;
            color: rgba(0, 0, 0, 0.15);
        }

        .card-box .card-box-footer {
            position: absolute;
            left: 0px;
            bottom: 0px;
            text-align: center;
            padding: 3px 0;
            color: rgba(255, 255, 255, 0.8);
            background: rgba(0, 0, 0, 0.1);
            width: 100%;
            text-decoration: none;
        }

        .card-box:hover .card-box-footer {
            background: rgba(0, 0, 0, 0.3);
        }

        .bg-blue {
            background-color: #00c0ef !important;
        }

        .bg-green {
            background-color: #00a65a !important;
        }

        .bg-orange {
            background-color: #f39c12 !important;
        }

        .bg-red {
            background-color: #d9534f !important;
        }
    </style>
@endsection
