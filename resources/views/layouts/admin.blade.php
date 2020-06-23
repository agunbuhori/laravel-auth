
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ url('/') }}/"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Belajar Islam - @yield('title')</title>

    @component('components.css')
	@endcomponent
</head>

<body class="navbar-top">
    @component('components.navbar')
    @endcomponent
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			@component('components.sidebar')
            @endcomponent
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
                    @yield('content')

                    @component('components.footer')
                    @endcomponent
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
    <!-- /page container -->
    @component('components.js')
    @endcomponent
	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!-- /theme JS files -->
</body>
</html>
