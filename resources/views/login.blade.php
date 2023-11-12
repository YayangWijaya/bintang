
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<title>Work Scout</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/colors.css') }}">

</head>

<body>
<div id="wrapper">

<header class="sticky-header">
<div class="container">
	<div class="sixteen columns">

		<div id="logo">
			<h1 style="display: flex;align-items: center;margin-top: 15px;"><a href="{{ route('index') }}"><img src="{{ asset('images/logo.png') }}" alt="PT Century Batteries Indonesia" style="height: 60px;margin-top: 0;margin-right: 10px;"/></a> PT Century Batteries Indonesia</h1>
		</div>

		<nav id="navigation" class="menu">
			<ul id="responsive">

				<li><a href="{{ route('index') }}">Home</a>
					<ul>
						<li><a href="{{ route('index') }}">Home #1</a></li>
						<li><a href="index-2.html">Home #2</a></li>
						<li><a href="index-3.html">Home #3</a></li>
						<li><a href="index-4.html">Home #4</a></li>
						<li><a href="index-5.html">Home #5</a></li>
					</ul>
				</li>

				<li><a href="#">Pages</a>
					<ul>
						<li><a href="job-page.html">Job Page</a></li>
						<li><a href="job-page-alt.html">Job Page Alternative</a></li>
						<li><a href="resume-page.html">Resume Page</a></li>
						<li><a href="shortcodes.html">Shortcodes</a></li>
						<li><a href="icons.html">Icons</a></li>
						<li><a href="pricing-tables.html">Pricing Tables</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</li>

				<li><a href="#">Browse Listings</a>
					<ul>
						<li><a href="browse-jobs.html">Browse Jobs</a></li>
						<li><a href="browse-resumes.html">Browse Resumes</a></li>
						<li><a href="browse-categories.html">Browse Categories</a></li>
					</ul>
				</li>

				<li><a href="#">Dashboard</a>
					<ul>
						<li><a href="dashboard.html">Dashboard</a></li>
						<li><a href="dashboard-messages.html">Messages</a></li>
						<li><a href="dashboard-manage-resumes.html">Manage Resumes</a></li>
						<li><a href="dashboard-add-resume.html">Add Resume</a></li>
						<li><a href="dashboard-job-alerts.html">Job Alerts</a></li>
						<li><a href="dashboard-manage-jobs.html">Manage Jobs</a></li>
						<li><a href="dashboard-manage-applications.html">Manage Applications</a></li>
						<li><a href="dashboard-add-job.html">Add Job</a></li>
						<li><a href="dashboard-my-profile.html">My Profile</a></li>
					</ul>
				</li>
			</ul>


			<ul class="responsive float-right">
				<li><a href="my-account.html#tab2"><i class="fa fa-user"></i> Sign Up</a></li>
				<li><a href="my-account.html"><i class="fa fa-lock"></i> Log In</a></li>
			</ul>

		</nav>

		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>

<div id="titlebar" class="single">
	<div class="container">
		<div class="sixteen columns">
			<h2>Dashboard</h2>
            <span>Masuk untuk melanjutkan</span>
		</div>
	</div>
</div>

<div class="container">

	<div class="my-account">
		<form method="post" class="login" method="post" action="{{ route('login') }}">
            <h2>Login Form</h2>
            @csrf
            <p class="form-row form-row-wide">
                <label for="email">Email:
                    <i class="ln ln-icon-Male"></i>
                    <input type="text" class="input-text" name="email" id="email" required/>
                </label>
            </p>

            <p class="form-row form-row-wide">
                <label for="password">Password:
                    <i class="ln ln-icon-Lock-2"></i>
                    <input class="input-text" type="password" name="password" id="password" required/>
                </label>
            </p>

            @if (session()->get('message'))
                <p style="color: #E12A2A;">{{ session()->get('message') }}</p>
            @endif

            <p class="form-row">
                <input type="submit" class="button border fw margin-top-10"/>
            </p>
        </form>
	</div>
</div>

<div class="margin-top-30"></div>

<div id="footer">
	<div class="container">

		<div class="seven columns">
			<h4>About</h4>
			<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			<a href="#" class="button">Get Started</a>
		</div>

		<div class="three columns">
			<h4>Company</h4>
			<ul class="footer-links">
				<li><a href="#">About Us</a></li>
				<li><a href="#">Careers</a></li>
				<li><a href="#">Our Blog</a></li>
				<li><a href="#">Terms of Service</a></li>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Hiring Hub</a></li>
			</ul>
		</div>

		<div class="three columns">
			<h4>Press</h4>
			<ul class="footer-links">
				<li><a href="#">In the News</a></li>
				<li><a href="#">Press Releases</a></li>
				<li><a href="#">Awards</a></li>
				<li><a href="#">Testimonials</a></li>
				<li><a href="#">Timeline</a></li>
			</ul>
		</div>

		<div class="three columns">
			<h4>Browse</h4>
			<ul class="footer-links">
				<li><a href="#">Freelancers by Category</a></li>
				<li><a href="#">Freelancers in USA</a></li>
				<li><a href="#">Freelancers in UK</a></li>
				<li><a href="#">Freelancers in Canada</a></li>
				<li><a href="#">Freelancers in Australia</a></li>
				<li><a href="#">Find Jobs</a></li>

			</ul>
		</div>

	</div>

	<div class="container">
		<div class="footer-bottom">
			<div class="sixteen columns">
				<h4>Follow Us</h4>
				<ul class="social-icons">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
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
