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
                        <li class="breadcrumb-item active">Admin Dashboard</li>
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
                            <h3>{{ $sentmails->count() }}</h3>

                            <p>Total Sent Mails</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-persons"></i>
                        </div>
                        <a href="{{ url('sentmails') }}" class="small-box-footer">View All Mails <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            @php
                                $totalrecipients = 0;
                            @endphp
                            @isset($sentmails)
                                @php

                                    $recipients = "";
                                    foreach ($sentmails as $mail) {
                                        $recipients.=$mail->recipients.",";
                                    }
                                    $allrecip = explode(",",rtrim($recipients, ","));

                                    $allrec = array_unique($allrecip);
                                    $totalrecipients = count($allrec);
                                @endphp
                            @endisset

                            <h3>{{ $totalrecipients }}</h3>

                            <p>Total # Recipients</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('sentmails') }}" class="small-box-footer">View All <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $sentmails->unique('category')->count() }}
                            </h3>

                            <p>Mail Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('sentmails') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $reservations->count() }}
                            </h3>

                            <p># of Reservations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('reservations') }}" class="small-box-footer">View All <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <h3>RECENT SENT MAILS</h3>
            <div id="container" class="row">
                <div class="card-body" style="overflow: auto;">
                <table class="table responsive-table" id="products" style="width: 100% !important;">
                    <thead>
                        <tr>

                            <th style="width: 20% !important;">Title</th>
                            <th>Recipients</th>
                            <th>Category</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sentmails as $sm)
                            <tr>

                                <td><b>{{ $sm->title }}</b></td>
                                <td>{{ $sm->recipients }}</td>
                                <td>{{ $sm->category }}</td>
                                <td>{{ $sm->status }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                </div>

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
