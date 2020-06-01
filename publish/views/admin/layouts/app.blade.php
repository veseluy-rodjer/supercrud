<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

	@yield('styles')

  {{-- <!-- Font Awesome --> --}}
  {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}"> --}}
  {{-- <!-- Ionicons --> --}}
  {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  {{-- <!-- Tempusdominus Bbootstrap 4 --> --}}
  {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
  {{-- <!-- iCheck --> --}}
  {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
  {{-- <!-- JQVMap --> --}}
  {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}"> --}}
  {{-- <!-- Theme style --> --}}
  {{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}"> --}}
  {{-- <!-- overlayScrollbars --> --}}
  {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
  {{-- <!-- Daterange picker --> --}}
  {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}"> --}}
  {{-- <!-- summernote --> --}}
  {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}"> --}}
  {{-- <!-- Google Font: Source Sans Pro --> --}}
  {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-user-name="{{ $user->name ?? 'Stranger'}}" data-present-toastr="{{ session('presentToastr') ?? ''}}">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layouts.navbar')

  <!-- Main Sidebar Container -->
  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $titlePage ?? '' }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $titlePage ?? '' }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
	@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

{{-- <!-- jQuery --> --}}
{{-- <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script> --}}
{{-- <!-- jQuery UI 1.11.4 --> --}}
{{-- <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}
{{-- <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --> --}}
{{-- <script> --}}
{{--   $.widget.bridge('uibutton', $.ui.button) --}}
{{-- </script> --}}
{{-- <!-- Bootstrap 4 --> --}}
{{-- <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
{{-- <!-- ChartJS --> --}}
{{-- <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script> --}}
{{-- <!-- Sparkline --> --}}
{{-- <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script> --}}
{{-- <!-- JQVMap --> --}}
{{-- <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
{{-- <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
{{-- <!-- jQuery Knob Chart --> --}}
{{-- <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
{{-- <!-- daterangepicker --> --}}
{{-- <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script> --}}
{{-- <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script> --}}
{{-- <!-- Tempusdominus Bootstrap 4 --> --}}
{{-- <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
{{-- <!-- Summernote --> --}}
{{-- <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
{{-- <!-- overlayScrollbars --> --}}
{{-- <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
{{-- <!-- AdminLTE App --> --}}
{{-- <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script> --}}
{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) --> --}}
{{-- <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script> --}}
{{-- <!-- AdminLTE for demo purposes --> --}}
{{-- <script src="{{ asset('admin/dist/js/demo.js') }}"></script> --}}
{{-- <!-- show picture by upload --> --}}
{{-- <script src="{{ asset('admin/js/jquery.uploadPreview.js') }}"></script> --}}
{{-- <!-- myJQueryScript --> --}}
{{-- <script src="{{ asset('admin/js/jquery.myJs.js') }}"></script> --}}
{{-- <!-- myNativScript --> --}}
{{-- <script src="{{ asset('admin/js/myNativJs.js') }}"></script> --}}

	@yield('jscripts')

</body>
</html>
