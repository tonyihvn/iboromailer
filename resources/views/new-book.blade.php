@extends('layouts.template')
@php
    $object = 'Book';
    if (isset($book->id)) {
        $type = 'Edit';
        $password_action = 'Change';
        $button = 'Save Changes';
    } else {
        $bid = 0;
        // $client = (object) [];
        $type = 'New';
        $password_action = '';
        $button = 'Save New ' . $object;
    }
@endphp
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $type }} {{ $object }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('books') }}">{{ $object }}</a></li>
                        <li class="breadcrumb-item active">{{ $type }} {{ $object }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">{{ $type }} {{ $object }} Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('saveBook') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="bid" value="{{ isset($book->id) ? $book->id : 0 }}">
                <input type="hidden" name="object" value="{{ $object }}">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Book Title Name</label>
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="Enter Book Title" value="{{ isset($book->title) ? $book->title : '' }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="subtitle">Book Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitle"
                            value="{{ isset($book->subtitle) ? $book->subtitle : '' }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="author">Author(s) Name </label>
                        <input type="text" class="form-control" name="author" id="author" placeholder="Book Authors"
                            value="{{ isset($book->author) ? $book->author : '' }}">

                    </div>
                    <div class="form-group col-md-3">
                        <label for="isbn_no">ISBN Number </label>
                        <input type="text" class="form-control" name="isbn_no" id="isbn_no" placeholder="ISBN Number"
                            value="{{ isset($book->isbn_no) ? $book->isbn_no : '' }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="publisher">Publisher Name </label>
                        <input type="text" class="form-control" name="publisher" id="publisher"
                            placeholder="Publisher Name" value="{{ isset($book->publisher) ? $book->publisher : '' }}">

                    </div>
                    <div class="form-group col-md-2">
                        <label for="copyright_year">Copyright Year </label>
                        <input type="text" class="form-control" name="copyright_year" id="copyright_year"
                            placeholder="Year" value="{{ isset($book->copyright_year) ? $book->copyright_year : '' }}">
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description">Book Details</label>
                        <textarea name="description" id="description" class="wyswygeditor">
                          Book abstract <em>goes</em> here
                        </textarea>

                        <small id="task_details" class="form-text text-muted">A Detailed infomation about the book being
                            entered</small>
                    </div>
                </div>


                <div class="row">

                    <div class="form-group col-md-3">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="{{ isset($book->category) ? $book->category : '' }}" selected>
                                {{ isset($book->category) ? $book->category : 'Select Category' }}</option>

                            @foreach ($categories->where('group_name', 'Books') as $cats)
                                <option value="{{ $cats->title }}">
                                    {{ $cats->title }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="category">Book Location</label>
                        <select name="category" id="category" class="form-control">
                            <option value="{{ isset($book->category) ? $book->category : '' }}" selected>
                                {{ isset($book->category) ? $book->category : 'Select Category' }}</option>

                            @foreach ($categories->where('group_name', 'Book Locations') as $cats)
                                <option value="{{ $cats->id }}">
                                    {{ $cats->title }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="{{ isset($book->status) ? $book->status : '' }}" selected>
                                {{ isset($book->status) ? $book->status : 'Select Status' }}</option>
                            <option value="Available">Available</option>
                            <option value="Out of Stock">Out of Stock</option>
                            <option value="Damaged">Damaged</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control" name="image" id="image" multiple>
                    </div>


                </div>

                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary  float-right">{{ $button }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
