@extends('layouts.template')

@php
    
    if (isset($product_id)) {
        $type = 'Edit';
        $button = 'Save Changes';
        $product_id = $product_id;
    } else {
        $cid = 0;
        // $client = (object) [];
        $type = 'New';
        $button = 'Save New ';
        $product_id = '';
    }
@endphp

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Files</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active">Add File</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">Upload File(s)</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('save-file') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="business_id" value="{{ Auth()->user()->business_id }}">
                <div class="form-group row">
                    <div class="col-md-8">
                        <label for="file_title">Enter Title / Subject of the File(s)</label>
                        <input type="text" class="form-control" name="file_title" id="file_title"
                            aria-describedby="file_title" placeholder="Enter a Title/Subject">
                    </div>
                    <div class="col-md-4">
                        <label for="product_id">Select Product</label>
                        <select class="form-control" name="product_id" id="product_id">
                            <option value="">Not Applicable</option>
                            @if (isset($product_id))
                                @php
                                    $proj = $business->products->where('id', $product_id)->first();
                                    echo '<option value="' . $proj->id . '" selected>' . $proj->title . '</option>';
                                @endphp
                            @else
                                @foreach ($business->products as $product)
                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-3">
                        <label for="files">Upload File(s)</label>
                        <input type="file" class="form-control" name="file_name" id="file_name" multiple>
                    </div>

                    <div class="col-md-3">
                        <label for="featured">Make Featured Image?</label>
                        <input type="checkbox" class="form-control" name="featured" id="featured" value="Yes">
                    </div>

                    <div class="col-md-3">
                        <label for="">Confirm and Submit</label>
                        <button type="submit" class="form-control btn btn-primary">Upload File(s)</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
