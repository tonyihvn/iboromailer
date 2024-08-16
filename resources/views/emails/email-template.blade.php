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
        {{-- <img src="{{ env('APP_URL') }}/public/images/ibotoFooter.png" alt="IBOTO EMPIRE"  style="width: 100%; height: auto; position: relative;"> --}}
        <div class="row">
            <div class="col-sm-6">
              <div class="first">
                <div class="companyarea">
                  <h4>ABOUT US</h4>
                  <ul>
                    <li>At Iboto Empire, we derive joy and excitement in helping you solve your IT related needs. whether you want us to deploy our IT solutions and services or you want to get trained and be certified; we are on standby to help you succeed by giving you first class IT services.</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="third">
                <div class="companyarea">
                  <h4>OUR SERVICES</h4>
                  <ul>
                    <a href="https://ibotoempire.com/terms.html"><li>Career Training</li></a>
                    <li>Certification Training</li>
                    <li>Consultancy Services</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="fourth">
                <div class="companyarea">
                  <h4>GET IN TOUCH</h4>
                  <ul>
                    <li>6101 Cherry Avenue Suite 102A Fontana,</li>
                    <li>CA 92336 USA</li>
                    <li>+1(909) 559-9031</li>
                    <li>contactus@ibotoempire.com</li>
                    <li>Mon to Fri: 9.00 AM 5.00 PM</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        <div style="text-align: center !important">
            <a href="https://ibotoempire.com/our-privacy-policies.html" target="_blank">Our Privacy Policy</a>
        </div>
    </div>
</body>
</html>
