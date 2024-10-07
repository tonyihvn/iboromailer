@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contacts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div id="container" class="row">
                <div class="card-body" style="overflow: auto;">
                <table class="table responsive-table" id="products" style="width: 100% !important;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Group</th>
                            <th>Other Info</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $cn)
                            <tr>
                                <td><b>{{ $cn->name }}</b></td>
                                <td>{{ $cn->email }}</td>
                                <td>{{ $cn->phone_number}}</td>
                                <td>{{ $cn->group }}</td>
                                <td>{{ $cn->info }}</td>
                                <td><a href="{{url('delete-client/'.$cn->id)}}" class="btn btn-danger"  onclick="return confirm('Are you sure you delete this clients?')">Delete</a></td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
