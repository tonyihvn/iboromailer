@extends('layouts.template')

@section('content')
<div class="container">
    <form action="{{ route('sendEmail') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="recipients">Recipients (comma-separated):</label>
                    <input type="text" name="recipients" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="mail_category" class="form-label">Send to Group</label>
                <select class="form-select form-control" id="contact_group" name="contact_group" style="font-size: 0.8em" >
                    <option value="Events" selected>Select Group</option>
                    @if (isset($groups))
                        @foreach ($groups->unique('group') as $gr)
                            <option value="{{$gr->group}}">{{$gr->group}}</option>
                        @endforeach
                        <option value="Community">Community</option>
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sender_name">Sender Name:</label>
            <input type="text" name="sender_name" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="top_image">Top Image:</label>
                    <input type="file" name="top_image" accept="image/*">
                </div>
            </div>

            <div class="col-md-5">
                <label for="mail_category" class="form-label">Mail Category</label>
                <select class="form-select form-control" id="mail_category" name="mail_category" >
                    <option value="Events">Events</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Interview">Interview</option>
                    <option value="Goodwill">Goodwill</option>
                    <option value="Announcement">Announcement</option>
                    <option value="Reminder">Reminder</option>
                    <option value="Scholarship">Scholarship</option>
                </select>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="bgcolor">Background Color:</label>
                    <input type="color" class="form-control" name="bgcolor" value="#EAE5C8">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="email_content">Email Content:</label>
            <textarea name="email_content" class="form-control wyswygeditor"></textarea>
        </div>



        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="url">URL:</label>
                    <input type="url" name="url" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="linkText">Link Text:</label>
                    <input type="text" name="linkText" class="form-control">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="bottom_image">Bottom Image:</label>
            <input type="file" name="bottom_image" accept="image/*">
        </div>
        <div style="float: right;">
            <button type="submit" class="btn btn-primary">Send Email</button>
        </div>
    </form>
</div>
@endsection
