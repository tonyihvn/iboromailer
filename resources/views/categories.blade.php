@extends('layouts.template')
@php
    $pagetype = 'Table';
    $pagename = 'Categories';
@endphp
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">

        <div class="card">
            <div class="card-heading">

                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#category">Add
                    New</a>


            </div>

            <div class="card-body">
                <table class="table  responsive-table" id="products">
                    <thead>
                        <tr style="color: ">
                            <th>Title</th>
                            <th>Group Name</th>
                            <th>Description</th>
                            <th>Facility</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $cat->title }}</td>
                                <td>{{ $cat->group_name }}</td>
                                <td>{{ $cat->description }}</td>
                                <td>{{ $cat->school->school_name }}</td>
                                <td><button class="label label-primary" id="ach{{ $cat->id }}"
                                        onclick="category({{ $cat->id }})" data-toggle="modal" data-target="#category"
                                        data-title="{{ $cat->title }}" data-group_name="{{ $cat->group_name }}"
                                        data-description="{{ $cat->description }}"
                                        data-school_id="{{ $cat->school_id }}">Edit</button>
                                    <a href="/delete-cat/{{ $cat->id }}" class="label label-danger"
                                        onclick="return confirm('Are you sure you want to delete {{ $cat->title }}\'s category?')">Delete</a>
                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <!-- Button to Open the Modal -->


    <!-- The Modal -->
    <div class="modal" id="category">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <form method="POST" action="{{ route('addcategory') }}">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="e.g. Politics and Culture">
                        </div>

                        <div class="form-group">
                            <label for="group_name">Category Group</label>
                            <input type="text" name="group_name" id="group_name" class="form-control"
                                placeholder="e.g. Major Categorization of item">

                        </div>



                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control"
                                placeholder="e.g. Explain this item">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="catbutton">
                                {{ __('Add Category') }}
                            </button>
                        </div>


                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
