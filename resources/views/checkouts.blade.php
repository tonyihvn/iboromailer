@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Book Checkouts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Book Checkouts</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="card">

        <div class="card-body" style="overflow: auto;">
            <table class="table responsive-table" id="products" style="font-size: 0.9em">
                <thead>
                    <tr>
                        <th>Title/Subtitle</th>
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
                        <tr @if ($ac->status == 'Checkedout') style="background-color:#EBF053 !important;" @endif>
                            </td>
                            <td style="width: 20% !important;"><b>{{ $ac->book->title }}</b>
                                <br>
                                <i>{{ $ac->book->subtitle }}</i>
                            </td>
                            <td>{{ $ac->borrower->name }}</td>
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

                                    <a href="/checkout-lost/{{ $ac->id }}" class="btn btn-success btn-xs">Lost</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
