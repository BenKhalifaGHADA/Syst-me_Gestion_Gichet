<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'RecyTrack') }}</title>
        <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
            <!-- google font -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
            <!-- fontawesome -->
            <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
            <!-- bootstrap -->
            <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
            <!-- owl carousel -->
            <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
            <!-- magnific popup -->
            <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
            <!-- animate css -->
            <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
            <!-- mean menu css -->
            <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
            <!-- main style -->
            <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
            <!-- SignInSignUp style -->
            <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
            <!-- responsive -->
            <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

            <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
            <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
            <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
            crossorigin="anonymous"
            />

            <!-- jquery -->
            <script src="/assets/js/jquery-1.11.3.min.js"></script>
            <!-- bootstrap -->
            <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
            <!-- count down -->
            <script src="/assets/js/jquery.countdown.js"></script>
            <!-- isotope -->
            <script src="/assets/js/jquery.isotope-3.0.6.min.js"></script>
            <!-- waypoints -->
            <script src="/assets/js/waypoints.js"></script>
            <!-- owl carousel -->
            <script src="/assets/js/owl.carousel.min.js"></script>
            <!-- magnific popup -->
            <script src="/assets/js/jquery.magnific-popup.min.js"></script>
            <!-- mean menu -->
            <script src="/assets/js/jquery.meanmenu.min.js"></script>
            <!-- sticker js -->
            <script src="/assets/js/sticker.js"></script>
            <!-- main js -->
            <script src="/assets/js/main.js"></script>
            <!-- SignInSignUp js -->
            <script src="/assets/js/app.js"></script>
    </head>
    <body>
                <!--PreLoader-->
        <div class="loader">
            <div class="loader-inner">
                <div class="circle"></div>
            </div>
        </div>
        <!--PreLoader Ends-->
        
        <!-- header -->
        <div class="top-header-area" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <div class="main-menu-wrap">
                            <!-- logo -->
                            <div class="site-logo">
                            <a class="navbar-brand" href="#">
                                <img src="/images/logo1.png" alt="Logo" width="216" height="40">
                            </a>
                            </div>
                            <!-- logo -->

                            <!-- menu start -->
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="{{ route('front-office.trashTypes') }}">Type</a></li>
                                    <li><a href="{{ route('front-office.lieux') }}">Lieu</a></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>

                            </nav>
                            <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>


        <!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@fruitkha.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">News</a></li>
							<li><a href="#">Event</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->>
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2023,  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
    </body>
</html>
