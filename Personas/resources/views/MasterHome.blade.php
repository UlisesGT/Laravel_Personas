<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<title>Personal </title>
		
		<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	
	
	</head>
	
	<body class="fixed-sidebar fixed-header content-appear skin-default">

		<div class="wrapper">	
			<div id="content">	

				@section('body')				
		
					CONTENIDO 					
						
				@show

			</div>
		</div>
			
		<footer class="footer footer-static footer-light navbar-border navbar-shadow">
			<div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
				<span class="float-md-left d-block d-md-inline-block">2022  &copy; TOKA Internacional</span>
			</div>
		</footer>

		<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
		<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		
	</body>

</html>
		