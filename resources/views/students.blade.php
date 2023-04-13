@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Students</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Students</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="card">

        <div class="card-body" style="overflow: auto;">
            <a href="{{ url('new-student') }}" class="btn btn-primary" style="float: right;">Add New</a>
            <br>
            <table class="table responsive-table" id="products">
                <thead>
                    <tr>
                        <th width="20">#</th>
                        <th>Full Name</th>
                        <th>Matric Number</th>
                        <th>Phone Number</th>
                        <th>Category</th>
                        <th># Books Held</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allstudents as $st)
                        <tr @if ($st->status == 'Active') style="background-color: azure !important;" @endif>
                            <td>{{ $st->id }}</td>
                            <td>{{ $st->name }}</td>
                            <td>{{ $st->matric_no }}</td>
                            <td>{{ $st->phone_number }}</td>
                            <td>{{ $st->category }}</td>
                            <td>{{ $st->books->count() }}</td>
                            <td>{{ $st->status }}</td>

                            <td width="90">
                                <div class="btn-group">
                                    <a href="/edit-student/{{ $st->id }}" class="btn btn-default btn-xs">Edit</a>

                                    <a href="/student-books/{{ $st->id }}" class="btn btn-success btn-xs">Books</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
