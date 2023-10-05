<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <div style="background-color: {{$bgcolor}} !important; position:relative;max-width:94%; padding: 3%;">
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
        <img src="{{ env('APP_URL') }}/public/images/ibotoFooter.png" alt="IBOTO EMPIRE"  style="width: 100%; height: auto; position: relative;">

        <div style="text-align: center !important">
            <a href="https://ibotoempire.com/our-privacy-policies.html" target="_blank">Our Privacy Policy</a>
        </div>
    </div>
</body>
</html>
