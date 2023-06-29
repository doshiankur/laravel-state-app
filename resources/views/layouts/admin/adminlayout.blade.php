<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('public/admintheme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/admintheme/bower_components/font-awesome/css/font-awesome.min.css')  }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/admintheme/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/admintheme/dist/css/AdminLTE.min.css') }}">
    <!-- Developer style -->
    <link rel="stylesheet" href="{{ asset('public/css/developer.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('public/admintheme/dist/css/skins/_all-skins.min.css') }}">
    <!-- Date Picker -->
    
    <link rel="stylesheet" href="{{ asset('public/admintheme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/admintheme/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    
    
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('public/css/datatables.min.css') }}"/> -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>


  
    @stack('style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="min-height: fit-content !important;">

    @include('layouts.admin.header')
    @include('layouts.admin.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
        <!-- /.content -->
    </div>
    @include('layouts.admin.footer')
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<!-- <script src="{{ asset('public/js/jquery.min.js') }}"></script> -->
<script src="{{ asset('public/admintheme/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('public/admintheme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/admintheme/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<!--<script src="{{ asset('public/admintheme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>-->
<!-- daterangepicker -->
<script src="{{ asset('public/admintheme/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('public/admintheme/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('public/admintheme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/admintheme/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('public/js/datatables.min.js') }}"></script>
 <script src="{{ asset('public/plugings/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/js/custom.js') }}"></script>

@stack('scripts')
</body>
</html>
