@extends('layouts.template')
@php
    $pagetype = 'Table';
    
    function daysCount($start_date, $duration)
    {
        $now = time(); // or your date as well
        $your_date = strtotime($start_date);
        $datediff = $now - $your_date;
    
        $noofdays = round($datediff / (60 * 60 * 24));
    
        if ($noofdays % $duration > 0) {
            echo $noofdays % $duration . ' Days';
        } else {
            echo $noofdays / $duration . ' Days';
        }
    }
    
    function nextDue($start_date, $duration)
    {
        $now = time(); // or your date as well
        $your_date = strtotime($start_date);
        $datediff = $now - $your_date;
        $today = Date('Y-m-d');
        $noofdays = round($datediff / (60 * 60 * 24));
    
        $daysmore = $noofdays % $duration;
    
        echo date('Y-m-d', strtotime($today . ' + ' . $daysmore . ' days'));
    }
@endphp
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Subscriptions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Subscriptions</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="card">

            <div class="card-body">
                <table class="table  responsive-table" id="products" style="font-size: 0.9em !important;">
                    <thead>
                        <tr style="color: ">
                            <th>Client</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Date Subscribed</th>
                            <th>Subscription-Plan</th>
                            <th>Remmitances</th>
                            <th>Next Due</th>
                            <th># of OverDue</th>
                            <th>Penalty</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $sub)
                            <tr>
                                <td>{{ $sub->client->name }}</td>
                                <td>{{ $sub->product->title }}</td>
                                <td>{{ $sub->quantity }}</td>
                                <td>{{ $sub->date_subscribed }}</td>
                                <td>{{ $sub->subplan->title . ' (' . $sub->subplan->amount_per . ' ' . $sub->subplan->frequency . ')' }}
                                </td>
                                <td>{{ 'Total Payments Days' }}</td>
                                <td>{{ nextDue($sub->date_subscribed, $sub->subplan->duration_per) }}</td>
                                <td>{{ daysCount($sub->date_subscribed, $sub->subplan->duration_per) }}</td>
                                <td>{{ $sub->penalties }}</td>
                                <td style="width: 8% !important">
                                    <form action="{{ route('paysub') }}" method="post">
                                        <div class="form-group row">
                                            <input type="hidden" value="{{ $sub->id }}">
                                            <input type="number" name="amount" class="form-control"
                                                style="height: 25px !important;" placeholder="Amount"><br>
                                            <input type="date" name="date_paid" class="form-control"
                                                style="height: 25px !important;" placeholder="Date">
                                        </div>
                                        <button class="btn btn-sm btn-primary float-right">Pay</button>
                                    </form>

                                    <a href="/delete-subplan/{{ $sub->id }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete {{ $sub->title }}\'s Subscription Plan?')">Delete</a>
                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
