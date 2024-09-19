@extends('layouts.template')

@section('content')
<div class="container">
    @isset($event)
        <form action="{{ route('publishEvent') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="event_id" value="{{$event->id}}">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Event Title/Topic:</label>
                        <input type="text" name="title" class="form-control" value="{{$event->title}}" required>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="subtitle">Event Sub Title/Topic:</label>
                        <input type="text" name="subtitle" class="form-control" value="{{$event->subtitle}}" required>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="form-group">
                    <label for="details">Details:</label>
                    <textarea name="details" class="form-control wyswygeditor">{!!$event->details!!}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="more_info">More Info:</label>
                    <textarea name="more_info" class="form-control wyswygeditor">{!! $event->more_info!!}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="from">From:</label>
                    <input type="date" name="from" class="form-control" value="{{$event->from}}" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="to">To:</label>
                    <input type="date" name="to" class="form-control" value="{{$event->to}}" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="venue">Venue:</label>
                    <input type="text" name="venue" class="form-control" value="{{$event->venue}}" required>
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

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bgcolor">Background Color:</label>
                        <input type="color" class="form-control" name="bgcolor"  value="{{$event->bgcolor}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="textcolor">Text Color:</label>
                        <input type="color" class="form-control" name="textcolor"  value="{{$event->textcolor}}">
                    </div>
                </div>

            </div>





            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="url">Payment URL:</label>
                        <input type="url" name="url" class="form-control" value="{{$event->url}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="linkText">Link Text:</label>
                        <input type="text" name="linkText" class="form-control" value="{{$event->linkText}}">
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="map_location">Map Location <small>(Embed Code)</small>:</label>
                        <input type="text" name="map_location" class="form-control" value="{{$event->map_location}}">
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="form-group">
                    <label for="postevent_detail">Post Event Detail</label>
                    <textarea name="postevent_detail" class="form-control wyswygeditor">{!! $event->postevent_detail!!}</textarea>
                </div>
            </div>

            <div>
                <div class="col-md-4 form-group">
                    <select name="status" id="status">
                        <option value="{{$event->status}}" selected>{{$event->status}}</option>
                        <option value="Past">Past</option>
                        <option value="">Upcoming</option>
                    </select>
                </div>
                <div class="col-md-8" style="float: right;">
                    <button type="submit" class="btn btn-primary">Update Event</button>
                </div>
            </div>
        </form>
    @endisset

</div>
@endsection
