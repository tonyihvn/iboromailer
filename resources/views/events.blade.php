@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Events</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Events</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div id="container" class="row">
                <div class="row align-content-end">
                    <a href="{{route('createEvent')}}" class="btn btn-primary float-right">Create New Event</a>
                </div>
                <div class="card-body" style="overflow: auto;">
                <table class="table responsive-table" id="products" style="width: 100% !important;">
                    <thead>
                        <tr>

                            <th style="width: 20% !important;">Event Title</th>
                            <th>Subtitle</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>

                                <td><b>{{ $event->title}}</b> <br> {{$event->from." / ".$event->venue }}</td>

                                <td>{{ $event->subtitle }}</td>
                                <td class="button-group">
                                    <a href="{{url('event/'.$event->id)}}" class="btn btn-sm btn-primary" target="_blank">View</a>
                                    <a href="{{url('edit-event/'.$event->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="{{url('postevent/'.$event->id)}}" class="btn btn-sm btn-success">After Event</a>
                                    <a href="{{url('deleteEvent/'.$event->id)}}" class="btn btn-sm btn-danger roledlink Super" onclick="confirm('Are you sure you delete this event?')">Delete</a>
                                </td>

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
