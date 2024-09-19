<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type= "text/css" href="{{ asset('/public/css-event/app.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$event->title}}</title>
    <link rel="stylesheet" href="{{asset('/public/css-event/jquery.dataTables.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css')}}">
    <meta name="meta_csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            background-image: url('{{ asset('/public/images-event/'.$event->slide1) }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        body::before {
            content: '';
            position: relative;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.5); /* White overlay with 50% opacity */
            z-index: -1;
            min-height: 100%;
        }

        #pagecontent{
            background-color: {{$event->bgcolor}};
            /* opacity: 1; */
            padding-top: 20px;
            padding-bottom: 20px;
        }
        h1,h2,p{
            font-size: 1.5em !important;
        }
        .btn{
            border-radius: 0px !important;
            padding-right: 20px;
            padding-left: 20px;
            border: white double 6px;
        }
        .row{
            padding: 10px;
        }
        .container{
            width: 100% !important;
        }
    </style>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0&appId=213102155499064" nonce="E5OeCkTq"></script>
<div class="nav-bar">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" id= "navbar-logo" href="/" ><img src="{{ asset('/public/images-event/logo.jpg') }}" class="logo" alt="IBOTO EMPIRE"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li><h1 style="color: white; font-weight: bold; margin-left: 30px; margin-right: 30px; margin-top: 15px;">{{$event->title}}</h1></li>
                    @if($event->status!="Past")
                        <li class="nav-item">
                            <a href="#about_event" class="nav-link">About this Event</a>
                        </li>
                        <li class="nav-item">
                            <a href="#location" class="nav-link">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="#register">Register to Participate</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
</div>
<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

<div class = "container" id="pagecontent">
    @if (session('message'))
        <div class="card-body">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                {!! session('message') !!}
            </div>
        </div>
    @endif


    @yield('content')
</div>

<div class="footer">
    <!--Footer-->
    <div class="row" style="background-color: white; padding-top: 20px; padding-bottom: 50px; justify-content: center;">
        <h5 style="text-align: center; color: #988647; font-weight: bold;">Our Certifications / Partners</h5>
        <img src="{{asset('/public/images-event/partners.jpg')}}" alt="Partners and Sponders" style="width: 80%; margin-left: 8%; margin-right: 10%;">
    </div>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark" style="color: white; padding-bottom: 60px;">
        <div class="col-lg-6">
            <div class="first">
                <div class="companyarea">
                <h4>ABOUT US</h4>
                <ul>
                    <li>At Iboto Empire, we derive joy and excitement in helping you solve your IT related needs. whether you want us to deploy our IT solutions and services or you want to get trained and be certified; we are on standby to help you succeed by giving you first class IT services.</li>
                </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
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

        <div class="col-lg-3">
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
    <footer id="footer" class="navbar navbar-expand-lg navbar-dark bg-dark" style="color: white;"><hr><br>

            <!--Copyright-->
            <div class="footer-text">
                © {{date("Y")}}:
                <a href="https://ibotoempire.com/"> Iboto Empire </a>
            </div>
            <!--/.Copyright-->
    </footer>
    <!--/.Footer-->
</div>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@if (isset($pagetype) && $pagetype == "wyswyg")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(function() {
            initializeSummernote();

            function initializeSummernote() {
                $('#wyswyg, .wyswyg').each(function() {
                    if (!$(this).data('summernote-initialized')) {
                        $(this).summernote({
                            height: 300, // Set the height of the editor
                            dialogsInBody: true,
                            toolbar: [
                                ['style', ['undo','redo','style']], // Style dropdown (e.g., paragraph, code)
                                ['font', ['bold', 'italic', 'underline', 'clear','strikethrough', 'superscript', 'subscript']], // Font style (bold, italic, underline)
                                ['fontname', ['fontname']], // Font family
                                ['fontsize', ['fontsize']], // Font size
                                ['fontsizeunit', ['fontsizeunit']], // Font size
                                ['color', ['forecolor', 'backcolor']], // Text color and background color
                                ['para', ['ul', 'ol', 'paragraph']], // Lists (unordered, ordered), paragraph formatting
                                ['height', ['height']], // Line height
                                ['table', ['table']], // Insert table
                                ['insert', ['link', 'picture', 'video', 'hr']], // Insert links, images, videos, horizontal rule
                                ['view', ['fullscreen', 'codeview','help']], // Fullscreen mode, code view, help
                            ],
                            popover: {
                                image: [
                                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                                    ['remove', ['removeMedia']]
                                ],
                                link: [
                                    ['link', ['linkDialogShow', 'unlink']]
                                ],
                                table: [
                                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                                ],
                                air: [
                                    ['color', ['color']],
                                    ['font', ['bold', 'underline', 'clear']],
                                    ['para', ['ul', 'paragraph']],
                                    ['table', ['table']],
                                    ['insert', ['link', 'picture']]
                                ]
                            },
                            callbacks: {
                                onImageUpload: function(files) {
                                    uploadImage(files[0]);
                                }
                            }
                        });
                        $(this).data('summernote-initialized', true);
                    }
                });
            }

            function uploadImage(file) {
                let data = new FormData();
                data.append("file", file);

                // Add CSRF token to the FormData
                data.append("_token", $('meta[name="meta_csrf-token"]').attr('content'));

                $.ajax({
                    url: '{{ route('upload.image') }}',
                    method: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.url) {
                            $('#wyswyg').summernote('insertImage', response.url);
                        }
                    },
                    error: function(response) {
                        console.error('Error uploading image:', response.responseText);
                    }
                });
            }

        });

        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.copy-url');
            images.forEach(image => {
                image.addEventListener('click', function() {
                    const url = this.getAttribute('data-url');
                    const input = document.createElement('input');
                    input.value = url;
                    document.body.appendChild(input);
                    input.select();
                    document.execCommand('copy');
                    document.body.removeChild(input);
                    alert('URL copied to clipboard: ' + url);
                });
            });
        });


    </script>
@endif
@if (isset($pagetype) && $pagetype=="report")

	<script src="{{asset('/public/js-event/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('/public/js-event/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('/public/js-event/jszip.min.js')}}"></script>
	<script src="{{asset('/public/js-event/buttons.print.min.js')}}"></script>
    <script src="{{asset('/public/js-event/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('/public/js-event/dataTables.select.min.js')}}"></script>
    <script src="{{asset('/public/js-event/dataTables.searchPanes.min.js')}}"></script>
	<script src="{{asset('/public/js-event/pdfmake.min.js')}}"></script>
	<script src="{{asset('/public/js-event/vfs_fonts.js')}}"></script>
	<script src="{{asset('/public/js-event/buttons.html5.min.js')}}"></script>
	<script src="{{asset('/public/js-event/buttons.colVis.min.js')}}"></script>


	<script>


		// TABLES WITH FILTERS
		$('#products thead tr').clone(true).appendTo( '#products thead' );
		$('#products thead tr:eq(1) th:not(:last)').each( function (i) {
			var title = $(this).text();
			$(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" value="" />' );

			$( 'input', this ).on( 'keyup change', function () {
				if ( table.column(i).search() !== this.value ) {
					table
						.column(i)
						.search( this.value )
						.draw();
				}
			} );
		} );


		var table = $('#products,.products2').DataTable( {
			orderCellsTop: true,
			fixedHeader: true,
			"paging": true,
			"footer": false,
			"pageLength": 100,
			"filter": true,
			"ordering": true,
			deferRender: true,
			dom: 'Bfrtip',
			"order": [0, "asc"],

			buttons: [{
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
			{
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
			{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },

				'csv', 'print','colvis',

			]
		});





		$('.buttons-pdf').click(function(){
			$("#products th:last-child, #products td:last-child").remove();
		})
	</script>
@endif
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6668e0599a809f19fb3c9934/1i04qoo6e';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();

    document.querySelectorAll('.clickable-image').forEach(img => {
            img.addEventListener('click', function () {
                const src = this.getAttribute('data-src');
                document.getElementById('modalImage').setAttribute('src', src);
            });
        });
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
