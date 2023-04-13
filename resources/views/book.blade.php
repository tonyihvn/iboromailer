@extends('layouts.template')
<style>
    .list-group {
        font-size: 0.9em !important;
    }
</style>
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Book Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Book Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->

        <div class="widget-user-header text-white"
            style="background: @if (isset($book->image)) url({{ asset('public/files/' . $book->image) }}); @endif background-size: cover; background-position: top; height: 250px !important; text-shadow: 2px 2px #000; background-color: grey;">
            <h1 class="text-right">{{ $book->title }}</h1>
            <h5 class="widget-user-desc text-right">Subtitle: {{ $book->subtitle }}</h5>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-sm-3 border-right">
                    <div class="description-block">
                        <h5 class="description-header">
                            {{ isset($book->supplies[0]) ? $book->supplies->sum('quantity_supplied') : 0 }}
                        </h5>
                        <span class="description-text">TOTAL SUPPLIED</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 border-right">
                    <div class="description-block">
                        <h5 class="description-header">
                            {{ isset($book->checkouts[0]) ? $book->checkouts->where('status', 'Checkedout')->sum('quantity_checkout') : 0 }}
                        </h5>
                        <span class="description-text">TOTAL CHECKOUTS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <div class="description-block">
                        <h5 class="description-header">
                            {{ isset($book->stock) ? $book->stock->quantity : 0 }}
                        </h5>
                        <span class="description-text">QUANTITY AVAILABLE</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <div class="description-block">
                        <h5 class="description-header">
                            New
                        </h5>
                        <a href="#checkout" class="description-text btn btn-success">CHECKOUT</a>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">

                    <div class="card">
                        <img class="card-img-top" src="{{ asset('public/files/' . $book->image) }}" alt="Book Image">

                        <span class="badge badge-warning badge-pill" style="margin: 10px;">STATUS:
                            {{ $book->status }}</span>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center active small">
                                    Category:
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $book->category }}
                                </li>

                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center active small">
                                    Supplier:
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    @foreach ($suppliers as $sup)
                                        {{ isset($sup->supplier->name) ? $sup->supplier->name : '' }}<br>
                                    @endforeach
                                </li>

                            </ul>

                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center active small">
                                    Shelve Location:
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">

                                    {{ $book->location }}
                                </li>

                            </ul>

                            <h6>Add Supplies</h6>
                            <form method="POST" action="{{ route('saveSupply') }}">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Supplier</label>
                                        <select name="supplier_id" class="form-control select2" id="supplier_id">
                                            <option value="1">Select Supplier</option>
                                            @foreach ($students->where('role', 'Supplier') as $stu)
                                                <option value="{{ $stu->id }}" data-name="{{ $stu->name }}">
                                                    {{ $stu->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quantity_supplied">Quantity Supplied</label>
                                            <input type="number" value="1" name="quantity_supplied"
                                                id="quantity_supplied" class="form-control" placeholder="e.g. Qty">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="batch_no">Batch Number</label>
                                            <input type="text" value="1" name="batch_no" id="batch_no"
                                                class="form-control" placeholder="e.g. Batch Number">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Date Supplied:</label>
                                        <div class="input-group date" id="date_supplied_activator"
                                            data-target-input="nearest">
                                            <input type="text" name="date_supplied"
                                                class="form-control datetimepicker-input"
                                                data-target="#date_supplied_activator"
                                                value="{{ isset($project->start_date) ? $project->start_date : '' }}">
                                            <div class="input-group-append" data-target="#date_supplied_activator"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 8px;">
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-primary float-right" id="catbutton">
                                            {{ __('Add Supply') }}
                                        </button>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="row" style="color:dodgerblue;">
                        <h5>Book Description: </h5>
                    </div>
                    <div class="row" style="background-color:aliceblue; padding: 8px; margin-bottom: 30px;">
                        <p style="text-align: left;">{!! $book->description !!}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-12 card" id="checkout" style="background-color:azure;">
                            <h3 style="text-align:center !important; color:tomato;">Add New Checkout</h3>
                            <hr>
                            <form method="POST" action="{{ route('saveCheckout') }}">
                                @csrf

                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="book_id" value="{{ $book->id }}">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Student Name</label>
                                        <select name="student_id" class="form-control select2" id="student_id">
                                            @foreach ($students->where('role', 'Student') as $stu)
                                                <option value="{{ $stu->id }}" data-name="{{ $stu->name }}">
                                                    {{ $stu->name }} ({{ $stu->matric_no }})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Choose Checkout Plan</label>
                                        <select name="subscription_plan" class="form-control" id="subscription_plan">
                                            @foreach ($categories->where('group_name', 'Checkout Plans') as $cl)
                                                <option value="{{ $cl->id }}" data-name="{{ $cl->title }}">
                                                    {{ $cl->title }} ({{ $cl->description }})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quantity_checkout">Quantity Borrowed</label>
                                            <input type="number" value="1" name="quantity_checkout"
                                                id="quantity_checkout" class="form-control" placeholder="e.g. Qty">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="penalty">Penalty on Default</label>
                                            <input type="text" name="penalty" id="penalty" class="form-control"
                                                placeholder="e.g. Penalty">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Expected Return Date:</label>
                                        <div class="input-group date" id="date_subscribed_activator"
                                            data-target-input="nearest">
                                            <input type="text" name="expected_checkin"
                                                class="form-control datetimepicker-input"
                                                data-target="#date_subscribed_activator"
                                                value="{{ isset($project->start_date) ? $project->start_date : '' }}">
                                            <div class="input-group-append" data-target="#date_subscribed_activator"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="Checkedout">CheckedOut</option>
                                            <option value="Returned">Returned</option>
                                            <option value="Return Overdue">Return Overdue</option>
                                            <option value="Lost">Lost</option>
                                            <option value="Terminated">Terminated</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary float-right" id="catbutton">
                                                {{ __('Checkout') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="row">
                        <h6>BORROWERS LIST</h6>
                        <table class="table responsive-table" id="products" style="font-size: 0.9em">
                            <thead>
                                <tr>

                                    <th>Borrowed By</th>
                                    <th>Date of Checkout</th>
                                    <th>Expected Check-In</th>
                                    <th>Actual Checking</th>
                                    <th>Qty</th>
                                    <th>Penalty</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accesses as $ac)
                                    <tr
                                        @if ($ac->status == 'Checkedout') style="background-color:#EBF053 !important;" @endif>
                                        </td>

                                        <td><b>{{ $ac->borrower->name }}</b></td>
                                        <td>{{ $ac->checkout_date }}</td>
                                        <td>{{ $ac->expected_checkin }}</td>
                                        <td>{{ $ac->actual_checkin }}</td>
                                        <td>{{ $ac->quantity_checkout }}</i></td>
                                        <td>{{ $ac->penalty }}</td>
                                        <td>{{ $ac->status }}</td>
                                        <td width="90">
                                            <div class="btn-group">
                                                <a href="/checkout-returned/{{ $ac->id }}"
                                                    class="btn btn-default btn-xs">Returned</a>

                                                <a href="/checkout-lost/{{ $ac->id }}"
                                                    class="btn btn-success btn-xs">Lost</a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <div class="row">
                        <h6>SUPPLIES MADE FOR THIS BOOK</h6>
                        <table class="table responsive-table" id="products" style="font-size: 0.9em">
                            <thead>
                                <tr>

                                    <th>Supplied By</th>
                                    <th>Date</th>

                                    <th>Qty</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplies as $ac)
                                    <tr>
                                        </td>

                                        <td><b>{{ $ac->supplier->name }}</b></td>
                                        <td>{{ $ac->date_supplied }}</td>
                                        <td>{{ $ac->quantity_supplied }}</td>
                                        <td width="90">


                                            <a href="/delete-supply/{{ $ac->id }}"
                                                class="btn btn-success btn-xs">Delete</a>

                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
