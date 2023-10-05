<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iboto Empire</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/jquery.datetimepicker.css') }}">

</head>

<body class="hold-transition register-page">
    <div>
        <div class="register-logo">
            <a href="/"><b>Iboto</b>Empire</a>
        </div>

        <div class="card">
            <div class="card-body">
                <!-----------------------------START YIELD PAGE CONTENT -->
                @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <i class="fa fa-check-circle"></i> {!! Session::get('message') !!}
                    </div>
                @endif
                @yield('content')


            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

      <!-- jQuery -->
      <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <!-- jQuery UI 1.11.4 -->
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="{{ asset('dist/js/jquery.datetimepicker.full.js') }}"></script>


        <script>
            $(function() {

                $('.datepicker').datetimepicker({
                    formatDate:'Y/m/d H:i'
                });

            });
        </script>
</body>

</html>
