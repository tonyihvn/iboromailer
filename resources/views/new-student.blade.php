@extends('layouts.template')
@php
    
    if (isset($student->id)) {
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
                        <li class="breadcrumb-item"><a href="{{ url('students') }}">{{ $object }}</a></li>
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
            <form action="{{ route('saveStudent') }}" method="post">
                @csrf
                <input type="hidden" name="cid" value="{{ isset($student->id) ? $student->id : 0 }}">
                <input type="hidden" name="object" value="{{ $object }}">
                <input type="hidden" name="oldpassword" value="{{ isset($student->password) ? $student->password : '' }}">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter a Full Name" value="{{ isset($student->name) ? $student->name : '' }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="matric_no">{{ $object }} ID</label>
                        <input type="text" class="form-control" name="matric_no" id="matric_no"
                            placeholder="e.g. Matric Number / ID"
                            value="{{ isset($student->matric_no) ? $student->matric_no : '' }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="address">Address </label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Home Address"
                            value="{{ isset($student->address) ? $student->address : '' }}">

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <label>Date of Birth:</label>
                        <div class="input-group date" id="start_date_activator" data-target-input="nearest">
                            <input type="text" name="dob" class="form-control datetimepicker-input"
                                data-target="#start_date_activator"
                                value="{{ isset($student->dob) ? $student->dob : '' }}">
                            <div class="input-group-append" data-target="#start_date_activator"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="{{ isset($student->gender) ? $student->gender : '' }}" selected>
                                {{ isset($student->gender) ? $student->gender : 'Select Role' }}</option>

                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                            placeholder="Phone Number"
                            value="{{ isset($student->phone_number) ? $student->phone_number : '' }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address"
                            value="{{ isset($student->email) ? $student->email : '' }}">
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
                            <option value="{{ isset($student->category) ? $student->category : '' }}" selected>
                                {{ isset($student->category) ? $student->category : 'Select Category' }}</option>

                            @foreach ($categories as $cats)
                                <option value="{{ $cats->title }}">
                                    {{ $cats->title }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="{{ isset($student->status) ? $student->status : '' }}" selected>
                                {{ isset($student->status) ? $student->status : 'Select Status' }}</option>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Terminated">Terminated</option>
                            <option value="Awaiting Approval">Awaiting Approval</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="role">System Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="{{ isset($student->role) ? $student->role : '' }}" selected>
                                {{ isset($student->role) ? $student->role : 'Select Role' }}</option>

                            <option value="Student">Student User</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                            <option value="Supplier">Supplier</option>

                            <option value="Super">Super</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary  float-right">{{ $button }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
