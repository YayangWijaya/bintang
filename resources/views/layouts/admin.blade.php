
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PT Century Batteries Indonesia</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard-2.html') }}">
<link rel="stylesheet" href="{{ asset('css/colors.css') }}">
<script src="https://cdn.tailwindcss.com"></script>
@stack('style')

</head>

<body>
<div id="wrapper">
<header class="dashboard-header">
<div class="container">
	<div class="sixteen columns" style="align-items: center;display: flex;justify-content: space-between;margin-top: 5;">

		<div id="logo">
			<h1 style="display: flex;align-items: center;"><a href="{{ route('index') }}"><img src="{{ asset('images/logo.png') }}" alt="PT Century Batteries Indonesia" style="height: 60px;margin-top: 0;margin-right: 10px;"/></a> PT Century Batteries Indonesia</h1>
		</div>

		<div style="text-align: right;margin-right: 20px;">
			<p style="margin: 0;line-height: 20px;"><strong>{{ auth()->user()->name }}</strong></p>
			<p style="margin: 0;">{{ auth()->user()->role_name }}</p>
        </div>
	</div>
</div>
</header>
<div class="clearfix"></div>

<div id="dashboard">

	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Menu">
				@if (auth()->user()->is_candidate)
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a style="text-decoration: none;" href="{{ route('dashboard') }}">Status Lowongan</a></li>
                @else
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a style="text-decoration: none;" href="{{ route('dashboard') }}">Dashboard</a></li>
				{{-- <li class="{{ request()->routeIs('candidate*') ? 'active' : '' }}"><a style="text-decoration: none;" href="{{ route('candidate.index') }}">Data Kandidat</a></li> --}}
				<li class="{{ request()->routeIs('application*') ? 'active' : '' }}"><a style="text-decoration: none;" href="{{ route('application.index') }}">Data Lamaran</a></li>
				<li class="{{ request()->routeIs('job*') ? 'active' : '' }}"><a style="text-decoration: none;" href="{{ route('job.index') }}">Data Loker</a></li>
                @endif
				<li class=""><a style="text-decoration: none;" href="{{ route('logout') }}">Logout</a></li>
			</ul>

		</div>
	</div>
	<div class="dashboard-content">

		@yield('content')

	</div>
</div>

<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session()->get('success'))
<script>
Swal.fire({
    title: 'Sukses',
    text: '{{ session()->get('success') }}',
    icon: 'success',
    confirmButtonText: 'Ok'
})
</script>
@endif

@if (session()->get('error'))
<script>
Swal.fire({
    title: 'Error',
    text: '{{ session()->get('error') }}',
    icon: 'error',
    confirmButtonText: 'Ok'
})
</script>
@endif

@stack('scripts')
</body>

</html>
