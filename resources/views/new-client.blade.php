@extends('layouts.template')
@php
    $object = 'Client';
    if (isset($client->id)) {
        $type = 'Edit';
        $password_action = 'Change';
        $button = 'Save Changes';
    } else {
        $cid = 0;
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
                        <li class="breadcrumb-item"><a href="{{ url('clients') }}">{{ $object }}</a></li>
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
            <form action="{{ route('saveClient') }}" method="post">
                @csrf
                <input type="hidden" name="cid" value="{{ isset($client->id) ? $client->id : 0 }}">
                <input type="hidden" name="object" value="{{ $object }}">
                <input type="hidden" name="oldpassword" value="{{ isset($client->password) ? $client->password : '' }}">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter a Full Name" value="{{ isset($client->name) ? $client->name : '' }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="company_name">Employer / Organization</label>
                        <input type="text" class="form-control" name="company_name" id="company_name"
                            placeholder="Company name"
                            value="{{ isset($client->company_name) ? $client->company_name : '' }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="service_no">Service Number</label>
                        <input type="text" class="form-control" name="service_no" id="service_no"
                            placeholder="Service Number"
                            value="{{ isset($client->service_no) ? $client->service_no : '' }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="ippis_no">IPPIS NO:</label>
                        <input type="text" class="form-control" name="ippis_no" id="ippis_no" placeholder="IPPIS Number"
                            value="{{ isset($client->ippis_no) ? $client->ippis_no : '' }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="service_no">Salary Grade Level</label>
                        <input type="text" class="form-control" name="service_no" id="service_no"
                            placeholder="Service Number"
                            value="{{ isset($client->service_no) ? $client->service_no : '' }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="ippis_no">Step:</label>
                        <input type="text" class="form-control" name="ippis_no" id="ippis_no" placeholder="IPPIS Number"
                            value="{{ isset($client->ippis_no) ? $client->ippis_no : '' }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="about">About {{ $object }} </label>
                        <input type="text" class="form-control" name="about" id="about"
                            aria-describedby="about_client" placeholder="About"
                            value="{{ isset($client->about) ? $client->about : '' }}">
                        <small id="about_client" class="form-text text-muted">Please, write a brief information about the
                            {{ $object }}</small>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="address">Address </label>
                        <input type="text" class="form-control" name="address" id="address"
                            placeholder="Residential or office address"
                            value="{{ isset($client->address) ? $client->address : '' }}">

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                            placeholder="Phone Number"
                            value="{{ isset($client->phone_number) ? $client->phone_number : '' }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Email Address" value="{{ isset($client->email) ? $client->email : '' }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="password">{{ $password_action }} Password</label>
                        <input type="text" class="form-control" name="password" id="password"
                            placeholder="{{ $type }} Password for the  {{ $object }}">
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="{{ isset($client->category) ? $client->category : '' }}" selected>
                                {{ isset($client->category) ? $client->category : 'Select Category' }}</option>

                            @foreach ($categories as $cats)
                                <option value="{{ $cats->id }}">
                                    {{ $cats->title }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="{{ isset($client->status) ? $client->status : '' }}" selected>
                                {{ isset($client->status) ? $client->status : 'Select Status' }}</option>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Terminated">Terminated</option>
                            <option value="Awaiting Approval">Awaiting Approval</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="role">System Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="{{ isset($client->role) ? $client->role : '' }}" selected>
                                {{ isset($client->role) ? $client->role : 'Select Role' }}</option>

                            <option value="Client">Client User</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>

                            <option value="Super">Super</option>
                        </select>
                    </div>
                </div>



                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">{{ $button }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
