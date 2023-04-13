@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Books</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="card">

        <div class="card-body" style="overflow: auto;">
            <a href="{{ url('new-book') }}" class="btn btn-primary" style="float: right;">Add New</a>
            <br>
            <table class="table responsive-table" id="products" style="font-size: 0.9em">
                <thead>
                    <tr>

                        <th>Image</th>
                        <th style="width: 20% !important;">Title</th>
                        <th>Sub Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>ISBN / Year</th>
                        <th style="font-size: 0.8em;">Checkouts /Available</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $bk)
                        <tr @if ($bk->status == 'Active') style="background-color: azure !important;" @endif>
                            <td><img src="{{ asset('public/files/' . $bk->image) }}" style="width: 40px; height: 70px;">
                            </td>

                            <td><b>{{ $bk->title }}</b></td>
                            <td>{{ $bk->subtitle }}</td>
                            <td>{{ $bk->author }}</td>
                            <td>{{ $bk->publisher }}</td>
                            <td>{{ $bk->isbn_no }} - <i>{{ $bk->copyright_year }}</i></td>
                            <td>{{ $bk->checkouts->count() }} / {{ isset($bk->stock->quantity) ? $bk->stock->quantity : 0 }}
                            </td>
                            <td>{{ $bk->status }}</td>

                            <td width="90">
                                <div class="btn-group">
                                    <a href="/edit-book/{{ $bk->id }}" class="btn btn-default btn-xs">Edit</a>

                                    <a href="/book/{{ $bk->id }}" class="btn btn-success btn-xs">View</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
