@extends('layouts.template')
<style>
    body {
        margin: 0;
        padding: 0;
    }

    #map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
    }
</style>

@php
    
    if (isset($product->id)) {
        $type = 'Edit';
        $button = 'Save Changes to';
        $product_id = $product->id;
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
                    <h1 class="m-0">{{ $type }} Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('products') }}">Products</a></li>
                        <li class="breadcrumb-item active">{{ $type }} Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">{{ $type }} Product Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('save-product') }}" method="post">
                @csrf

                <input type="hidden" name="product_id" value="{{ $product_id }}">

                @if (isset($client_id))
                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                @else
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Select Supplier</label>
                            <select name="supplier_id" class="form-control select2">
                                @foreach ($suppliers as $cl)
                                    <option data-select2-id="{{ $cl->id }}" value="{{ $cl->id }}">
                                        {{ $cl->name }} ({{ $cl->company_name }})</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                @endif

                <div class="form-group col-md-12">
                    <label for="title">Project Title</label>
                    <input type="text" class="form-control" name="title" id="title"
                        aria-describedby="project_title" placeholder="Enter a Title"
                        value="{{ isset($product->title) ? $product->title : '' }}">
                    <small id="project_title" class="form-text text-muted">A descriptive name of the project</small>
                </div>



                <div class="form-group col-md-12">
                    <label for="detail">Details</label>
                    <textarea name="detail" id="detail" class="wyswygeditor">
              {{ isset($product->detail) ? $product->detail : 'Place <em>some</em> <u>text</u> <strong>here</strong>' }}
            </textarea>

                    <small id="task_details" class="form-text text-muted">A Detailed infomation about the product
                        entered</small>
                </div>

                <div class="form-group row">


                    <div class="col-md-3">
                        <label>Available From:</label>
                        <div class="input-group date" id="start_date_activator" data-target-input="nearest">
                            <input type="text" name="start_date" class="form-control datetimepicker-input"
                                data-target="#start_date_activator"
                                value="{{ isset($product->start_date) ? $product->start_date : '' }}">
                            <div class="input-group-append" data-target="#start_date_activator"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label>To:</label>
                        <div class="input-group date" id="end_date_activator" data-target-input="nearest">
                            <input type="text" name="end_date" class="form-control datetimepicker-input"
                                data-target="#end_date_activator"
                                value="{{ isset($product->end_date) ? $product->end_date : '' }}">
                            <div class="input-group-append" data-target="#end_date_activator" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Price"
                            value="{{ isset($product->price) ? $product->price : '' }}">
                    </div>

                    <div class="col-md-3">
                        <label>Status:</label>
                        <select name="status" class="form-control">
                            <option value="{{ isset($product->status) ? $product->status : '' }}" selected>
                                {{ isset($product->status) ? $product->status : 'Select Status' }}</option>
                            <option value="Upcoming">Upcoming</option>
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                            <option value="Paused">Paused</option>
                            <option value="Terminated">Terminated</option>
                        </select>
                    </div>


                </div>

                <div class="form-group col-md-12">
                    <label for="terms">Terms and Conditions</label>
                    <textarea name="terms" id="terms" class="wyswygeditor">
              {{ isset($product->terms) ? $product->terms : 'Place <em>some</em> <u>text</u> <strong>here</strong>' }}
            </textarea>

                    <small id="task_details" class="form-text text-muted">Explain the terms and conditions</small>
                </div>

                <div class="row">
                    <div class="col-md-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary">{{ $button }} Product</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection
