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
              <li class="breadcrumb-item"><a href="{{ \Route::has('home.index') ? route('home.index') : '' }}">Home</a></li>
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
	  <div style="text-align: center">Here will my contacts</div>
  </footer>

  <!-- Control Sidebar -->
  {{-- <aside class="control-sidebar control-sidebar-dark"> --}}
    {{-- <!-- Control sidebar content goes here --> --}}
  {{-- </aside> --}}
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

	@yield('jscripts')

</body>
</html>
