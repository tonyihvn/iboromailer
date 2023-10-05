<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>

    <div style="background-color:#C8BF8A !important; position:relative;max-width:94%; padding: 3%;">
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
    </div>
</body>
</html>
