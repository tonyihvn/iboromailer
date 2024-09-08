@extends('layouts.template-event')

@section('content')
@isset($event)
<style>
    row{
        background-color: @php echo $event->bgcolor; @endphp !important;
    }

    p,h1,h2,h3,h4,h5,h6{
        color: @php echo $event->textcolor; @endphp !important;
    }

    .btn{
        border-color: @php echo $event->bgcolor; @endphp !important;
    }
    #map iframe{
        width: 100% !important; min-height: 325px; height: auto;
    }
</style>
    <div class="container">

            <div class="row" style="background-color: black; opacity: 0.8;">
                <div class="col-md-8">
                    <style>
                        .carousel-item {
                            background-color: transparent;
                            color: white;
                        }
                        .carousel-caption {
                            background-color: rgba(0, 0, 0, 0.5); /* Transparent black background */
                            width: 100%;
                        }
                    </style>

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                                @isset($event->slide1)
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('/public/images-event/'.$event->slide1) }}" alt="{{ $event->title }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $event->title }}</h5>
                                            <p>{{ $event->subtitle }}</p>
                                            <a href="#register" class="btn btn-primary">Start Here</a>
                                        </div>
                                    </div>
                                @endisset

                                @isset($event->slide2)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/public/images-event/'.$event->slide2) }}" alt="{{ $event->title }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $event->title }}</h5>
                                            <p>{{ $event->subtitle }}</p>
                                            <a href="#register" class="btn btn-primary">Start Here</a>
                                        </div>
                                    </div>
                                @endisset

                                @isset($event->slide3)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/public/images-event/'.$event->slide3) }}" alt="{{ $event->title }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $event->title }}</h5>
                                            <p>{{ $event->subtitle }}</p>
                                            <a href="#register" class="btn btn-primary">Start Here</a>
                                        </div>
                                    </div>
                                @endisset

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                    <img src="{{ asset('/public/images-event/'.$event->flyer1)}}" width="100%" height="auto" alt="FLYER">
                </div>
            </div>




        <div class="row" id="about_event">
            <div class="col-md-8">
                <div class="row"><h1 style="font-size: 2em; font-weight: bold;">{{$event->title}}</h1></div>
                <div class="row"><h2>Topic: <b>{{$event->subtitle}}</b></h2></div>
                <hr>
                <div class="row"><p>{!!$event->details!!}</p></div>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img src="{{ asset('/public/images-event/'.$event->flyer2)}}" width="100%" height="auto" alt="FLYER">
            </div>
        </div>

        <div class="row">
            @if($event->flyer3 !="")
                <div class="col-md-12">
                    <img src="{{ asset('/public/images-event/'.$event->flyer3)}}" style="width: 100%; height: auto" alt="FLYER">
                </div>
            @endif
        </div>
        <hr>

        <div class="row" id="location">
            <div class="col-md-4">
                <h2><i class="nav-icon fas fa-calendar" style="color: red;"></i> {!! $event->from ? date('jS F, Y', strtotime($event->from)) : '' !!} {!!$event->to ? "<br> to ".date('jS F, Y', strtotime($event->to)) : ""!!}</h2>
                <hr>
                <h3><i class="nav-icon fas fa-map-marker" style="color: red;"></i> {{$event->venue}} </h3>

                <h6>Map Location</h6>
                <div style="position: relative; overflow: hidden;" id="map">
                    {!! $event->map_location !!}
                </div>
            </div>
            <div class="col-md-4 card" style="padding: 20px"  id="register">
                <h3>Register to Participate</h3>
                <hr>
                <form action="{{ route('registerEvent') }}" method="POST">
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="other_names" placeholder="Other Names" name="other_names" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="your_conference_interest" placeholder="What are you expecting from this conference" name="your_conference_interest" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>

            </div>
            <div class="col-md-4" style="position: relative; overflow: hidden">
                <div class="fb-page" data-href="https://web.facebook.com/training4skilldevelopment" data-tabs="timeline" data-width="1000" style="width: 100% !important" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/training4skilldevelopment" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/training4skilldevelopment">Iboto Empire</a></blockquote></div>
            </div>
        </div>

        <div class="row">
            <p>{!!$event->more_info!!}</p>
        </div>
    </div>
@endisset

@endsection
