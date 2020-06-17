<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Company | @yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('storage/app/logo/logodongphucandy.png')}}" type="image/png">
        <link rel="stylesheet" href="{{ asset('public/customInput/custom.scss') }}">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ asset('public/admin/bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/AdminLTE/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('public/AdminLTE/css/skins/_all-skins.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('public/plugins/iCheck/flat/blue.css')}}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{ asset('public/plugins/morris/morris.css')}}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset('public/plugins/datepicker/datepicker3.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('public/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
        <link href="{{ asset('public/register/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/admin/css/style.css')}}">

        <!-- jQuery 2.2.3 -->
        <script src="{{ asset('public/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
        <script type="text/javascript">
            var root = '{{url("/")}}';
            var mn_selected = '';
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Header -->
            @include('admin.layouts.header')

            <!-- Left side column. contains the logo and sidebar -->
            @include('admin.layouts.main-sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('breadcrumb')
                    <div class="row">
                        <div class="col-xs-12">
                            <div id="flash_message">
                                @if(Session::has('message'))
                                <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable">
                                    <button data-dismiss="alert" class="close" type="button">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                    {{Session::get('message')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Footer -->
            @include('admin.layouts.footer')
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        @include('admin.layouts.deleteModal') 
        <!-- ./wrapper -->
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.6 -->
        <!-- <script src="{{ asset('public/editor/ckeditor/ckeditor.js')}}"></script>
        <script>CKEDITOR.replace('ckeditor');</script> -->
        <script src="{{ asset('public/admin/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ asset('public/plugins/morris/morris.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('public/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
        <!-- jvectormap -->
        <script src="{{ asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{ asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('public/plugins/knob/jquery.knob.js')}}"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- datepicker -->
        <script src="{{ asset('public/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
        <!-- Slimscroll -->
        <script src="{{ asset('public/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{ asset('public/plugins/fastclick/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('public/AdminLTE/js/app.min.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('public/AdminLTE/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('public/AdminLTE/js/demo.js')}}"></script>
        <!-- Common JS -->
        <script src="{{ asset('public/admin/js/admin.js')}}"></script>
        <script src="{{ asset('public/register/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('public/register/vendor/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('public/register/js/global.js') }}"></script> 
    </body>
</html>
