@extends('layouts.guest_template')
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
                        <li class="breadcrumb-item active">Make Reservation</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2>Reservation Form</h2>
    <form method="POST" action="{{ route('reservation.store') }}">
        @csrf

        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Event</label>
            <input type="text" class="form-control" id="title" name="title" >
        </div>

        <div class="mb-3">
            <label for="selected_role" class="form-label">Do you want to Play any role/serve? Please select</label>
            <select class="form-select form-control" id="selected_role" name="selected_role" >
                <option value="Guest">Guest</option>
                <option value="Speaker">Speaker</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div class="mb-3">
            <label for="date_time_arrival" class="form-label">Expected Date and Time of Arrival</label>
            <input type="text" class="form-control datepicker" id="date_time_arrival" name="date_time_arrival" >
        </div>

        <div class="mb-3">
            <label for="expectations" class="form-label">Expectations from the Book Launch</label>
            <textarea class="form-control" id="expectations" name="expectations" rows="4" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Reservation</button>
    </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
