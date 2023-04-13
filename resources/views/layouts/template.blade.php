<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LibraryManager | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->

    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <style>
        .card,
        .card-body,
        table {
            width: 100% !important;
            -- overflow: auto !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('public/images/' . $school->logo) }}" alt="RealtyPlus"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ '/home' }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span
                            class="badge badge-danger navbar-badge">{{ $mytasks->where('category', 'Message')->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('public/images/' . $school->logo) }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    @foreach ($mytasks->where('category', 'Message') as $msg)
                                        <h3 class="dropdown-item-title">
                                            {{ $msg->createdBy->name }}
                                            <span class="float-right text-sm text-danger"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <a class="text-sm"
                                            href="{{ url('task/' . $msg->id) }}">{{ $msg->subject }}</a>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                            {{ $msg->created_at }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>

                        <a href="{{ url('tasks') }}" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span
                            class="badge badge-warning navbar-badge">{{ $mytasks->where('category', 'Notification')->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span
                            class="dropdown-item dropdown-header">{{ $mytasks->where('category', 'Notification')->count() }}
                            Notification(s)</span>
                        <div class="dropdown-divider"></div>
                        @foreach ($mytasks->where('category', 'Notification') as $noti)
                            <a href="{{ url('task/' . $noti->id) }}" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> {{ $noti->subject }}
                                <span class="float-right text-muted text-sm">{{ $noti->start_date }}
                                    {{ $noti->start_date == $noti->end_date ? ' ' : $noti->end_date }} </span>
                            </a>
                        @endforeach

                        <div class="dropdown-divider"></div>

                        <a href="{{ url('tasks') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true"
                        href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ '/home' }}" class="brand-link">
                <img src="{{ asset('public/images/' . $school->logo) }}" alt="RealtyPlus"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">LibraryManager</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/passport.jpg') }}" class="img-circle elevation-2"
                            alt="User Image"> <span style="color: white">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">

                        </a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="{{ url('/') }}" class="nav-link active">
                                <i class="nav-icon fas fa-dashboard"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Books
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('books') }}" class="nav-link">
                                        <i class="far fa-books nav-icon"></i>
                                        <p>All Books</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('new-book') }}" class="nav-link">
                                        <i class="far fa-add nav-icon"></i>
                                        <p>New Book</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('checkouts') }}" class="nav-link">
                                        <i class="far fa-add nav-icon"></i>
                                        <p>Checkouts</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Students
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('students') }}" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>All Students</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('new-student') }}" class="nav-link">
                                        <i class="far fa-user-plus nav-icon"></i>
                                        <p>New Student</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ url('staff') }}" class="nav-link">
                                        <i class="far fa-user-plus nav-icon"></i>
                                        <p>Staff/Librarians</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('add-staff') }}" class="nav-link">
                                        <i class="far fa-user-plus nav-icon"></i>
                                        <p>Add New Staff</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('suppliers') }}" class="nav-link">
                                        <i class="far fa-user-plus nav-icon"></i>
                                        <p>Suppliers/Vendors</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('add-supplier') }}" class="nav-link">
                                        <i class="far fa-user-plus nav-icon"></i>
                                        <p>Add New Suppliers</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Tasks
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('tasks') }}" class="nav-link">
                                        <i class="far fa-tasks nav-icon"></i>
                                        <p>View Tasks</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('new-task') }}" class="nav-link">
                                        <i class="far fa-user-plus nav-icon"></i>
                                        <p>New Task</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('settings') }}" class="nav-link" data-toggle="modal"
                                        data-target="#settings">
                                        <i class="far fa-settings nav-icon"></i>
                                        <p>System Settings</p>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('categories') }}" class="nav-link">
                                        <i class="far fa-user-plus nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('barcodes') }}" class="nav-link">
                                        <i class="far fa-user-plus nav-icon"></i>
                                        <p>Print Barcodes</p>
                                    </a>
                                </li>



                            </ul>
                        </li>



                        <li class="nav-item">
                            <a href="{{ url('logout') }}" class="nav-link">
                                <i class="nav-icon far fa-user text-info"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                    @if (isset($pagename))
                        <div class="card" style="padding: 10px; margin-left: 10px; background-color:aquamarine;">
                            <b>NOTE:</b><br>
                            <p>You need to create the following Category Group Names: <br>
                            <ul>
                                <li>Book Locations</li>
                                <li>Books</li>
                                <li>Checkout Plans</li>
                                <li>Students</li>
                                <li>Suppliers</li>
                                <li>Staff</li>
                                <li>Tasks</li>
                            </ul>
                            </p>
                        </div>
                    @endif
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-----------------------------START YIELD PAGE CONTENT -->
                    @if (Session::get('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {!! Session::get('message') !!}
                        </div>
                    @endif
                    @yield('content')

                    <!----------------------------END YIELD PAGE CONTENT -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="">Anthony Nwokoma - NOUN
                    Project</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- The Settings Modal -->
    <div class="modal" id="settings">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Application Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <form method="POST" action="{{ route('settings') }}" id="settingsform"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $school->id }}">

                        <input type="hidden" name="oldlogo" value="{{ $school->logo }}">

                        <input type="hidden" name="oldbackground" value="{{ $school->background }}">

                        <div class="form-group">
                            <label for="school_name">SchoolName</label>
                            <input type="text" name="school_name" id="school_name" class="form-control"
                                value="{{ $school->school_name }}">
                        </div>

                        <div class="form-group">
                            <label for="motto">Motto</label>
                            <input type="text" name="motto" id="motto" class="form-control"
                                value="{{ $school->motto }}">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ $school->address }}">
                        </div>




                        <div class="form-group">
                            <label for="logo">Upload Logo Image</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="background">Upload Background Image</label>
                            <input type="file" name="background" id="background" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="color">Choose System Colour</label>
                            <input type="color" name="color" id="color" class="form-control"
                                value="{{ $school->color }}">
                        </div>

                        <div class="form-group">
                            <label for="user_id" class="control-label ">Admin User</label>
                            <select class="form-control" name="user_id" id="user_id">
                                <option value="{{ $school->user_id }}" selected>{{ $school->user->name }}
                                </option>
                                @foreach ($staff as $hm)
                                    <option value="{{ $hm->id }}">{{ $hm->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mode">Mode</label>
                            <select class="form-control" name="mode" id="mode">
                                <option value="{{ $school->mode }}">{{ $school->mode }}</option>
                                <option value="Active" selected>Active</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save Settings') }}
                            </button>
                        </div>


                    </form>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @if (isset($pagetype) && $pagetype == 'Dashboard')
        <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>

        <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    @endif

    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>

    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {

            $('.date').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('.select2').select2();

            $('.wyswygeditor').summernote()

        });

        function category(accid) {
            var title = $('#ach' + accid).attr("data-title");
            var group_name = $('#ach' + accid).attr("data-group_name");
            var description = $('#ach' + accid).attr("data-description");
            var school_id = $('#ach' + accid).attr("data-school_id");


            $('#id').val(accid);
            $('#title').val(title);
            $('#group_name').val(group_name).attr("selected", "selected");
            $('#description').val(description);
            $('#catbutton').html("Update Category");
            $('#school_id').val(school_id);

        }

        // ADD MATERIAL CHECKOUT
        $(".add_item").click(function() {
            // alert("Am here!");
            // $(".spechead").show();
            var item_class = $(".add_item").attr("id");
            var old_class = parseFloat(item_class);
            new_class = old_class + 1;
            $(".add_item").prop('id', new_class);

            $("#1").clone().attr('id', new_class).appendTo("#item_list");
            $("#" + new_class + " a").prop('id', "re" + new_class);

            // $("table tbody#item_list").append("<tr scope='row' class='row"+new_class+"'><td class='input-field'><input type='text' name='property[]' value='' placeholder='e.g. Color, Brand etc'></td><td class='input-field'><td class='input-field'><input type='text' name='value[]' value='' placeholder='e.g. Red, HP etc'></td><td><a href='#' class='btn-floating red btn-small delpos' onClick='delRow("+new_class+")'><i class='small material-icons'>remove</i></a></td></tr>");

        });

        $(document.body).on('click', '.removeitem', function(event) {

            var item_id = $(this).attr("id");
            item_id = item_id.substr(2);

            $("#" + item_id).remove();
            $("#itrow" + item_id).remove();
        });

        // ADD STAFF CHECKOUT
        $(".adds_item").click(function() {
            var item_class = $(".adds_item").attr("id");
            var old_class = parseFloat(item_class);
            new_class = old_class + 1;
            $(".adds_item").prop('id', new_class);

            $("#100").clone().attr('id', new_class).appendTo("#staff_list");
            $("#" + new_class + " a").prop('id', "res" + new_class);

            // $("table tbody#item_list").append("<tr scope='row' class='row"+new_class+"'><td class='input-field'><input type='text' name='property[]' value='' placeholder='e.g. Color, Brand etc'></td><td class='input-field'><td class='input-field'><input type='text' name='value[]' value='' placeholder='e.g. Red, HP etc'></td><td><a href='#' class='btn-floating red btn-small delpos' onClick='delRow("+new_class+")'><i class='small material-icons'>remove</i></a></td></tr>");

        });

        $(document.body).on('click', '.removesitem', function(event) {

            var item_id = $(this).attr("id");
            item_id = item_id.substr(3);

            $("#" + item_id).remove();
            $("#itrow2" + item_id).remove();

        });

        $("#searchkey").on('change', function postinput() {
            var searckkey = $(this).val(); // this.value
            $.ajax({
                url: 'searchbook',
                data: {
                    searckkey: searckkey
                },
                type: 'post'
            }).done(function(responseData) {
                console.log('Done: ', responseData);
            }).fail(function() {
                console.log('Failed');
            });
        });
    </script>

    @if (isset($pagetype) && $pagetype == 'Table')
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

        <script>
            // TABLES WITH FILTERS
            $('#products thead tr').clone(true).appendTo('#products thead');
            $('#products thead tr:eq(1) th:not(:last)').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" value="" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });

            var table = $('#products').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                "order": [
                    [0, "asc"]
                ],
                "paging": true,
                "pageLength": 50,
                "filter": true,
                "ordering": true,
                deferRender: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        </script>
    @endif
</body>

</html>
