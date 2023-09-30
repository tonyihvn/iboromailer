<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <div style="background-color:#C8BF8A !important; position:relative;width:94%; padding: 3%;">
        {{-- <img src="{{ env('APP_URL') }}/public/images/{{ $top_image }}" alt="IBOTO EMPIRE"> --}}
        <img src="https://kentonsolutions.com.ng/img/1.jpg" alt="IBOTO EMPIRE" style="width: 100%; height: auto; position: relative;">
        <p>{!! $content !!}</p>
        <div style="float: right">
        <a href="{{ $url }}" style="display: inline-block; padding: 10px; background-color: #007bff; color: #fff; text-decoration: none;">{{$linkText}}</a>
        </div>
        <hr>
        <img src="https://kentonsolutions.com.ng/img/iborobuttom.png" alt="IBOTO EMPIRE" style="width: 100%; height: auto; position: relative;">
        {{-- <img src="{{ env('APP_URL') }}/public/images/{{ $bottom_image }}" alt="IBOTO EMPIRE"> --}}
    </div>
</body>
</html>
