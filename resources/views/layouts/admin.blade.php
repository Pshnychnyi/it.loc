<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ isset($title) ? $title : '' }}</title>
    <meta content="{{ isset($keywords) ? $keywords : '' }}" name="keywords">
    <meta content="{{ isset($meta_desc) ? $meta_desc : '' }}" name="description">
    <!-- Favicon -->
        <link href="{{ asset("storage/img/favicon.ico") }}" rel="icon">
    
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	{{-- <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
	<!-- iCheck -->
	{{-- <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
	<!-- JQVMap -->
	{{-- <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}"> --}}
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
	<!-- overlayScrollbars -->
	{{-- <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
	<!-- Daterange picker -->
	{{-- <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}"> --}}
	<!-- summernote -->
	<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="{{ asset('dist/IMG/adminltELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
		</div>

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			
			<div class="col-md-12 d-flex justify-content-between">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
				</ul>
				
				<div class="navbar-nav">
					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="btn btn-light float-right">Выйти</button>
					</form>
				</div>
				
			</div>

			
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			@yield('navigation')
		</aside>
		<!-- /.sidebar -->
		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			@if ($errors->any())
				<div class="alert alert-danger alert-dismissible">
					@foreach ($errors->all() as $error)
						<p>{{$error }}</p>
					@endforeach
				</div>
			@endif

			@if (session('error'))
				<div class="alert alert-danger alert-dismissible">
					<p>{{ session('error') }}</p>
				</div>
			@endif
			@if (session('status'))
				<div class="alert alert-success alert-dismissible">
					<p>{{ session('status') }}</p>
				</div>
			@endif
			@yield('content')
		</div>
		<!-- /.content-wrapper -->
		@yield('footer')

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	<!-- jQuery UI 1.11.4 -->
	{{-- <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	{{-- <script>
		$.widget.bridge('uibutton', $.ui.button)
	</script> --}}
	<!-- Bootstrap 4 -->
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- ChartJS -->
	{{-- <script src="{{ asset('plugins/chart.js/chart.min.js') }}"></script> --}}
	<!-- Sparkline -->
	{{-- <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script> --}}
	<!-- JQVMap -->
	{{-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
	<!-- jQuery Knob Chart -->
	{{-- <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
	<!-- daterangepicker -->
	{{-- <script src="{{ asset('plugins/moment/moment.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script> --}}
	<!-- Tempusdominus Bootstrap 4 -->
	{{-- <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
	<!-- Summernote -->
	<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
	<!-- overlayScrollbars -->
	{{-- <script src="{{ asset('plugiNs/overlayscrollbars/js/jqueRy.overlayscrollbars.min.js') }}"></script> --}}
	<!-- AdminLTE App -->
	<script src="{{ asset('dist/js/adminlte.js') }}"></script>

	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	{{-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> --}}
	<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
