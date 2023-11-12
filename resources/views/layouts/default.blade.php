
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>PT Century Batteries Indonesia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
</head>
<body>
<div id="wrapper">
<header>
<div class="container" style="width: 100%;">
	<div class="sixteen columns" style="display: block;margin-top: 20px;width: 100%;">
        <div>
            <div style="display: flex;align-items: center;justify-content: center;">
                <a href="{{ route('index') }}"><img src="{{ asset('images/logo.png') }}" alt="PT Century Batteries Indonesia" style="height: 45px;margin: 0;"/></a>
                <h1 style="margin: 0;margin-left: 15px;font-size: 35px;">PT CENTURY BATTERIES INDONESIA</h1>
            </div>
        </div>

		<nav id="navigation" class="menu" style="width: 100%;display: flex;justify-content: center;margin-bottom: 20px;">
			<ul id="responsive">

				<li>
                    <a id="current" href="{{ route('index') }}">Home</a>
				</li>

                <li>
                    <a href="{{ route('login') }}">Login</a>
				</li>

			</ul>
		</nav>
	</div>
</div>
</header>
<div class="clearfix"></div>

@yield('content')

<div id="footer">
	<div class="container">
		<div class="footer-bottom">
			<div class="sixteen columns">
				<div class="copyrights">©  Copyright {{ date('Y') }} by <a href="#">PT Century Batteries Indonesia</a>. All Rights Reserved.</div>
			</div>
		</div>
	</div>
</div>

<div id="backtotop"><a href="#"></a></div>

</div>

<script src="{{ asset('scripts/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('scripts/jquery-migrate-3.1.0.min.js') }}"></script>
<script src="{{ asset('scripts/custom.js') }}"></script>
<script src="{{ asset('scripts/jquery.superfish.js') }}"></script>
<script src="{{ asset('scripts/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.themepunch.showbizpro.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('scripts/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('scripts/waypoints.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.jpanelmenu.js') }}"></script>
<script src="{{ asset('scripts/stacktable.js') }}"></script>
<script src="{{ asset('scripts/slick.min.js') }}"></script>
<script src="{{ asset('scripts/headroom.min.js') }}"></script>
</body>
</html>
