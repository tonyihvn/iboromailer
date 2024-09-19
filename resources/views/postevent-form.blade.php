@extends('layouts.template')

@section('content')
<div class="container">
    <form action="{{ route('publishPostEvent') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="hidden" name="event_id" value="{{$event_id}}">
            <div class="row">
                <div class="form-group">
                    <label for="postevent_detail">Details of the Event:</label>
                    <textarea name="postevent_detail" class="form-control wyswygeditor"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gallery">Gallery:</label>
                        <input type="file" name="gallery[]" accept="image/*" multiple>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="materials">Materials and Resources:</label>
                        <input type="file" name="materials[]" multiple>
                    </div>
                </div>

            </div>

        <div style="float: right;">
            <button type="submit" class="btn btn-primary">Publish Post Event</button>
        </div>
    </form>
</div>
@endsection
