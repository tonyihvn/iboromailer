@extends('layouts.template-event')

@section('content')
@isset($event)
<style>
    row{
        background-color: @php echo $event->bgcolor; @endphp !important;
    }

    p,h1,h2,h3,h4,h5,h6, ul, li, a{
        color: @php echo $event->textcolor; @endphp !important;
    }

    .btn{
        border-color: @php echo $event->bgcolor; @endphp !important;
    }
    #map iframe{
        width: 100% !important; min-height: 325px; height: auto;
    }
    .carousel-item {
        background-color: transparent;
        color: white;
    }
    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5); /* Transparent black background */
        width: 100%;
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    /* Grid styling */
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }
    .gallery img {
        width: 100%;
        height: auto;
        border: 5px solid white;
        padding: 5px;
        box-sizing: border-box;
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    .gallery img:hover {
        transform: scale(1.05);
    }

    /* Overlay styling */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.3s ease;
    }
    .overlay img {
        max-width: 90%;
        max-height: 90%;
        border: 5px solid white;
    }
    .overlay .close-btn, .overlay .prev-btn, .overlay .next-btn, .overlay .play-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 30px;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        cursor: pointer;
    }
    .overlay .close-btn {
        top: 20px;
        right: 20px;
    }
    .overlay .prev-btn {
        left: 20px;
    }
    .overlay .next-btn {
        right: 20px;
    }
    .overlay .play-btn {
        bottom: 20px;
        right: 50%;
        transform: translateX(50%);
    }
    .overlay.show {
        visibility: visible;
        opacity: 1;
    }
</style>
    <div class="container">

        @if($event->status=="Past")
            <div class="row">
                @isset($event->resources)
                    {!! $event->postevent_detail !!}
                @endisset
            </div>

            <hr style="border: 1px solid white">
            <div class="row">
                <!-- Carousel Section -->
                <div class="col-md-9">
                    <h3 style="color: {{$event->textcolor}}">Event in Pictures</h3>
                    <div class="gallery">
                        @foreach($images as $index => $image)
                            <img src="{{ asset($image) }}" alt="Gallery Image" onclick="openOverlay({{ $index }})">
                        @endforeach
                    </div>



                </div>


                <!-- Grid Section -->
                <div class="col-md-3">
                    <h3>Event Resources</h3>

                    <ul>
                        @foreach ($event->resources as $res)
                            <li><a target="_blank" href="{{asset('public/images-event/'.$event->id.'/'.$res->material_name)}}">{{$res->material_name}}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        @else

            <div class="row" style="background-color: black; opacity: 0.8;">
                <div class="col-md-8">

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
                    <img src="{{ asset('/public/images-event/'.$event->flyer2)}}" width="100%" height="auto" alt="FLYER">
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
                        <hr style="border: white 1px;">
                        <img src="{{ asset('/public/images-event/'.$event->flyer3)}}" style="width: 100%; height: auto" alt="FLYER">
                        <hr style="border: white 1px;">
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
                    <h3 style="color: black !important;">Register to Participate</h3>
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
        @endif


    </div>

    <div class="row">
        <h3>Event Forum</h3>
        <div class="col-md-12">
            <div id="disqus_thread"></div>
            <script>
                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://iboto-empire-lms.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay">
        <span class="close-btn" onclick="closeOverlay()">&times;</span>
        <span class="prev-btn" onclick="prevImage()">&#10094;</span>
        <span class="next-btn" onclick="nextImage()">&#10095;</span>
        <span class="play-btn" onclick="playSlideshow()">&#9654;</span>
        <img id="overlay-img" src="" alt="Full Size Image">
    </div>

    <script>
        let images = @json($images);  // Convert PHP array to JavaScript array
        let currentIndex = 0;
        let slideshowInterval = null;

        function openOverlay(index) {
            currentIndex = index;
            document.getElementById('overlay').classList.add('show');
            document.getElementById('overlay-img').src = "{{ asset('') }}" + images[currentIndex];
        }

        function closeOverlay() {
            document.getElementById('overlay').classList.remove('show');
            document.getElementById('overlay-img').src = ''; // Clear the image
            clearInterval(slideshowInterval);  // Stop slideshow if active
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById('overlay-img').src = "{{ asset('') }}" + images[currentIndex];
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            document.getElementById('overlay-img').src = "{{ asset('') }}" + images[currentIndex];
        }

        function playSlideshow() {
            // Stop current slideshow if already playing
            if (slideshowInterval !== null) {
                clearInterval(slideshowInterval);
                slideshowInterval = null;
                return;
            }

            slideshowInterval = setInterval(nextImage, 2000); // Change image every 2 seconds
        }
    </script>
@endisset

@endsection
