@extends('layouts.template')

@section('content')

<div class="container">
        <div class="card" style="padding: 20px; margin: 20px;">
            <h3>Recipients:</h3>
        <div class="row">

            <p>{{$mail->recipients}}</p>

        </div>
        <h3>Title:</h3>
        <div class="row">

            <p>{{$mail->title}}</p>
        </div>

        <div class="row">
            <p><b>Category:</b> {{$mail->category}}</p>
        </div>



        <div class="row">

                   <img src="{{ env('APP_URL') }}/public/images/{{ $mail->top_image }}" alt="Top Image">

        </div>
        <h3>Mail Body:</h3>
        <div class="row">
           <p style="text-align: left;"> {!!$mail->mail_body!!}</p>
        </div>


        <h3>Url:</h3>
        <div class="row">

           <p>{{$mail->link}}</p>
        </div>
                <h3>Status:</h3>
         <div class="row">

            <p>{{$mail->status}}</p>
         </div>
        </div>
</div>
@endsection
