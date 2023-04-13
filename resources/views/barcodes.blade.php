@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Book Barcodes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Books</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">

        @foreach ($books as $bk)
            <div class="card col-md-4" style="margin: 5px; text-align: center; padding: 5px;">
                <b>{{ $bk->title }}</b><br>

                {!! DNS1D::getBarcodeHTML($bk->isbn_no, 'C128', 1.4, 33) !!}

            </div>
        @endforeach



    </div>
@endsection
