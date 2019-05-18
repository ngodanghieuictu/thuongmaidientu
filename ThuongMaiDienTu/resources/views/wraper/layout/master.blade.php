<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>@yield('title')</title>

		<!-- Google font -->
		{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet"> --}}

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="/wraper/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="/wraper/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="/wraper/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="/wraper/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		{{-- <link rel="stylesheet" href="/wraper/css/font-awesome.min.css"> --}}

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="/wraper/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
		<style type="text/css">
			.sub_menu{
				display: none;
			}
			.main_menu:hover .sub_menu{
				display: block;
			}
		</style>
    </head>
	<body>
		<!-- HEADER -->
		@include('wraper.layout.header')
		<!-- END HEADER -->
		<!-- NAVIGATION -->
		@include('wraper.layout.navigation')
		<!-- /NAVIGATION -->
		<!-- SECTION -->
		@yield('content')
		<!-- END SECTION -->
		<!-- FOOTER -->
		@include('wraper.layout.footer')
		<!-- /FOOTER -->
		<!-- jQuery Plugins -->
		<script src="/wraper/js/jquery.min.js"></script>
		<script src="/wraper/js/bootstrap.min.js"></script>
		<script src="/wraper/js/slick.min.js"></script>
		<script src="/wraper/js/nouislider.min.js"></script>
		<script src="/wraper/js/jquery.zoom.min.js"></script>
		<script src="/wraper/js/main.js"></script>

	</body>
</html>