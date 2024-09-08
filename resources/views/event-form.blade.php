@extends('layouts.template')

@section('content')
<div class="container">
    <form action="{{ route('publishEvent') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">Event Title/Topic:</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="subtitle">Event Sub Title/Topic:</label>
                    <input type="text" name="subtitle" class="form-control" required>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="form-group">
                <label for="details">Details:</label>
                <textarea name="details" class="form-control wyswygeditor"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="more_info">More Info:</label>
                <textarea name="more_info" class="form-control wyswygeditor"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label for="from">From:</label>
                <input type="date" name="from" class="form-control" required>
            </div>

            <div class="form-group col-md-3">
                <label for="to">To:</label>
                <input type="date" name="to" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="venue">Venue:</label>
                <input type="text" name="venue" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="slide1">Slide 1:</label>
                    <input type="file" name="slide1" accept="image/*">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="slide2">Slide 2:</label>
                    <input type="file" name="slide2" accept="image/*">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="slide3">Slide 3:</label>
                    <input type="file" name="slide3" accept="image/*">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="flyer1">Flyer 1:</label>
                    <input type="file" name="flyer1" accept="image/*">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="flyer2">Flyer 2:</label>
                    <input type="file" name="flyer2" accept="image/*">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="flyer3">Flyer 3:</label>
                    <input type="file" name="flyer3" accept="image/*">
                </div>
            </div>

        </div>

        <div class="row">


            <div class="col-md-2">
                <div class="form-group">
                    <label for="bgcolor">Background Color:</label>
                    <input type="color" class="form-control" name="bgcolor" value="#EAE5C8">
                </div>
            </div>

        </div>





        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="url">Payment URL:</label>
                    <input type="url" name="url" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="linkText">Link Text:</label>
                    <input type="text" name="linkText" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="map_location">Map Location <small>(Embed Code)</small>:</label>
                    <input type="text" name="map_location" class="form-control">
                </div>
            </div>
        </div>

        <div style="float: right;">
            <button type="submit" class="btn btn-primary">Publish Event</button>
        </div>
    </form>
</div>
@endsection
