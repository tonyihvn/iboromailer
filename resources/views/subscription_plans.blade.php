@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Subscription Plans</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Subscription Plans</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="card">
            <div class="card-heading">

                <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#subplans"
                    style="margin: 10px">Add New Plan</a>


            </div>
            <div class="card-body">
                <table class="table  responsive-table" id="products">
                    <thead>
                        <tr style="color: ">
                            <th>Title</th>
                            <th>Product</th>
                            <th>Repayment Times</th>
                            <th>Frequency</th>
                            <th>Remmitance</th>
                            <th>Every</th>
                            <th>Penalty</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subplans as $sub)
                            <tr>
                                <td>{{ $sub->title }}</td>
                                <td>{{ $sub->product->title }}</td>
                                <td>{{ $sub->no_times }}</td>
                                <td>{{ $sub->frequency }}</td>
                                <td>{{ $sub->amount_per }}</td>
                                <td>{{ $sub->duration_per . ' Days' }}</td>
                                <td>{{ $sub->penalty }}</td>
                                <td><button class="label label-primary" id="ach{{ $sub->id }}"
                                        onclick="subplans({{ $sub->id }})" data-toggle="modal" data-target="#subplans"
                                        data-title="{{ $sub->title }}" data-frequency="{{ $sub->frequency }}"
                                        data-no_times="{{ $sub->no_times }}" data-duration_per="{{ $sub->duration_per }}"
                                        data-amount_per="{{ $sub->amount_per }}"
                                        data-business_id="{{ $sub->business_id }}">Edit</button>
                                    <a href="/delete-subplan/{{ $sub->id }}" class="label label-danger"
                                        onclick="return confirm('Are you sure you want to delete {{ $sub->title }}\'s Subscription Plan?')">Delete</a>
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
    <div class="modal" id="subplans">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Subscription Plan Form</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <form method="POST" action="{{ route('addsubplans') }}">
                        @csrf

                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="e.g. Give it a Title">
                        </div>

                        <div class="form-group">
                            <label>Product Name</label>
                            <select name="product_id" class="form-control" id="product_id">
                                @foreach ($products as $cl)
                                    <option value="{{ $cl->id }}" data-price="{{ $cl->price }}">
                                        {{ $cl->title }} ({{ $cl->price }}) - From:
                                        {{ $cl->supplier->company_name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_times">Repayment Times</label>
                                    <input type="number" name="no_times" id="no_times" class="form-control subplanCalc"
                                        placeholder="e.g. How many times to repay">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Frequency:</label>
                                <select name="frequency" class="form-control subplanCalc">
                                    <option value="Times">Times</option>
                                    <option value="Daily">Daily</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Monthly" selected>Monthly</option>
                                    <option value="Yearly">Yearly</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="amount_per">Remittance Amount</label>
                                    <input type="number" name="amount_per" id="amount_per" class="form-control"
                                        placeholder="How much for each repayment">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="duration_per">Days Interval</label>
                                    <input type="number" step="0.01" name="duration_per" id="duration_per"
                                        class="form-control" placeholder="How much for each repayment">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="penalty">Penalty</label>
                                    <input type="number" name="penalty" id="penalty" class="form-control"
                                        placeholder="Each time missed">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right" id="catbutton">
                                {{ __('Add Subscription Plan') }}
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
