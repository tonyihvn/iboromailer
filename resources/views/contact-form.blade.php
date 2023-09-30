@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contacts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contacts Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <form method="POST" action="{{ route('savecontacts') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email(s)</label><small><i>Seperate multiple emails with comma</i></small>
                        <input type="email" class="form-control" id="email" name="email" required>

                    </div>
                    <div class="row">
                        <div class="col-md-8">
                             <div class="form-group">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="group" class="form-label">Group</label>
                                <input type="text" list="groups" class="form-control" id="group" name="group" required>
                                <datalist id="groups">
                                    @if (isset($groups))
                                        @foreach ($groups as $gr)
                                            <option value="{{$gr->group}}">{{$gr->group}}</option>
                                        @endforeach
                                    @endif
                                </datalist>
                            </div></div>
                    </div>




                    <div class="form-group">
                        <label for="info" class="form-label">Additional Info (Optional)</label>
                        <textarea class="form-control" id="info" name="info" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Contact</button>
                </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
