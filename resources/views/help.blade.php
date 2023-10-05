@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Help</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Help</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div id="container" class="row">
                <div class="card-body" style="overflow: auto;">
                    <p>You can download a copy of the users guide here.</p>
                    <p><a href="{{url('/public/images/SOP.pdf')}}" class="btn btn-primary">Click Here to Get a Copy of the SOP Guide (in .PDF)</a></p>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
