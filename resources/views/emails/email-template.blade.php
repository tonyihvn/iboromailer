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
        <div class="row">
           

           

            <div class="col-sm-12">
                <div style="text-align: center !important">
                  <h4>GET IN TOUCH</h4>
                  <p>Office Address: 6101 Cherry Avenue Suite 102A Fontana, CA 92336 USA</p>
                  <p><b>Tel:</b> +1(909) 559-9031  <b>Email:</b> contactus@ibotoempire.com <b>Open Hours:</b> Mon to Fri: 9.00 AM 5.00 PM</p>
                  <p>Copyright © 2023 IBOTO EMPIRE. All rights reserved.</p>
                </div>
            </div>
          </div>

        <div style="text-align: center !important">
            <a href="https://ibotoempire.com/our-privacy-policies.html" target="_blank">Our Privacy Policy</a>
        </div>
    </div>
</body>
</html>
