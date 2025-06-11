<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        .email-container {
            background-color: {{$bgcolor}} !important;
            position: relative;
            max-width: 94%;
            padding: 3%;
            word-break: break-word;
            overflow-wrap: anywhere;
        }
        p, div, a, span, td, th {
            word-break: break-word;
            overflow-wrap: anywhere;
        }
    </style>
</head>
<body>
    <div class="email-container">
        @if ($top_image!="")
            <img src="{{ env('APP_URL') }}/public/images/{{ $top_image }}" alt="IBOTO EMPIRE"  style="width: 100%; height: auto; position: relative;">
        @endif
        <p>{!! $content !!}</p>
        @if ($url!="")
            <div style="float: right">
            <a href="{{ $url }}" style="display: inline-block; padding: 10px; background-color: #007bff; color: #fff; text-decoration: none;">{{$linkText}}</a>
            </div>
            <hr>
        @endif
        @if ($bottom_image!="")
            <img src="{{ env('APP_URL') }}/public/images/{{ $bottom_image }}" alt="IBOTO EMPIRE"  style="width: 100%; height: auto; position: relative;">
        @endif
        {{-- <img src="{{ env('APP_URL') }}/public/images/ibotoFooter.png" alt="IBOTO EMPIRE"  style="width: 100%; height: auto; position: relative;"> --}}
        

    </div>
        <div class="row" style="background-color: #bfb28e; text-align: center !important; font-size: 0.9em; clear: both; padding-top: 15px; padding-bottom: 15px; color: #475661">
            <div class="col-sm-12">
                <div>
                  <img src="https://ibotoempire.com/images/logo-transparent.png" alt="IBOTO EMPIRE"  style="width: 80px; height: 60px; position: relative;">
                  <p>Office Address: 6101 Cherry Avenue Suite 102A Fontana, CA 92336 USA</p>
                  <p><b>&#9743;</b> +1(909) 559-9031  <b>&#9993;</b> contactus@ibotoempire.com <b>&#9200;</b> Mon to Fri: 9.00 AM 5.00 PM</p>
                  <p>Copyright © 2023 IBOTO EMPIRE. All rights reserved.</p>
                </div>
            </div>
            <div style="text-align: center !important">
                <a href="https://ibotoempire.com/our-privacy-policies.html" target="_blank">Our Privacy Policy</a>
            </div>

          </div>
</body>
</html>
