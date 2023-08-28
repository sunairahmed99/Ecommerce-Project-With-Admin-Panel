<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Flipmart premium HTML5 & CSS3 Template</title>

	    <!-- Bootstrap Core CSS -->
        
	    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="{{'frontend/assets/css/main.css'}}">
	    <link rel="stylesheet" href="{{'frontend/assets/css/blue.css'}}">
	    <link rel="stylesheet" href="{{'frontend/assets/css/owl.carousel.css'}}">
		<link rel="stylesheet" href="{{'frontend/assets/css/owl.transitions.css'}}">
		<link rel="stylesheet" href="{{'frontend/assets/css/animate.min.css'}}">
		<link rel="stylesheet" href="{{'frontend/assets/css/rateit.css'}}">
		<link rel="stylesheet" href="{{'frontend/assets/css/bootstrap-select.min.css'}}">

	
		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="{{'frontend/assets/css/font-awesome.css'}}">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


	</head>
    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->
@include('frontend.Header')

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div>
    
    @if (session('status'))
						<div class="mb-4 font-medium text-sm text-green-600">
							{{ session('status') }}
						</div>
					@endif

					<x-validation-errors class="mb-4" />
	<form method="POST" action="{{isset($guard)? url($guard.'/login'): route('login')   }}" class="register-form outer-top-xs" role="form">
        @csrf
		<div class="form-group">
		    <label class="info-title" for="email">Email Address <span>*</span></label>
		    <input type="email" :value="old('email')" required autofocus autocomplete="username" name="email" id='email' class="form-control unicase-form-control text-input" >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
		    <input type="password" id='password' name='password' required class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
		</div>
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
		  	</label>
              @if (Route::has('password.request'))
		  	<a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
              @endif  
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
<x-validation-errors class="mb-4" />
	<h4 class="checkout-subtitle">Create a new account</h4>
	<form method="POST" action="{{ route('register') }}" class="register-form outer-top-xs" role="form">
        @csrf
		<div class="form-group">
	    	<label class="info-title" for="email">Email Address <span>*</span></label>
	    	<input type="email" name='email' :value="old('email')" class="form-control unicase-form-control text-input" id="email" required autocomplete="username" >
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="name">Name <span>*</span></label>
		    <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" required autocomplete="name" >
		</div>
        <div class="form-group">
		    <label class="info-title" for="phone">Phone Number <span>*</span></label>
		    <input type="text" name='phone' class="form-control unicase-form-control text-input" id="phone" required autocomplete="phone" >
		</div>
        <div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
		    <input type="password" name='password' id='password' class="form-control unicase-form-control text-input"  required autocomplete="new-password" >
		</div>
         <div class="form-group">
		    <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
		    <input type="password" name='password_confirmation' class="form-control unicase-form-control text-input" id="password_confirmation" >
		</div>
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">


    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
        <ul class="toggle-footer" style="">
            <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>+(888) 123-4567<br>+(888) 456-7890</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <span><a href="#">flipmart@themesground.com</a></span>
                </div>
            </li>
              
            </ul>
    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                <li><a href="#" title="About us">Order History</a></li>
                <li><a href="#" title="faq">FAQ</a></li>
                <li><a href="#" title="Popular Searches">Specials</a></li>
                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                          <li class="first"><a title="Your Account" href="#">About us</a></li>
                <li><a title="Information" href="#">Customer Service</a></li>
                <li><a title="Addresses" href="#">Company</a></li>
                <li><a title="Addresses" href="#">Investor Relations</a></li>
                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                <li><a href="#" title="Blog">Blog</a></li>
                <li><a href="#" title="Company">Company</a></li>
                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                  <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                  <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                  <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                  <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                  <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                  <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                  <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="assets/images/payments/1.png" alt=""></li>
                        <li><img src="assets/images/payments/2.png" alt=""></li>
                        <li><img src="assets/images/payments/3.png" alt=""></li>
                        <li><img src="assets/images/payments/4.png" alt=""></li>
                        <li><img src="assets/images/payments/5.png" alt=""></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{'frontend/assets/js/jquery-1.11.1.min.js'}}"></script>
	
	<script src="{{'frontend/assets/js/bootstrap.min.js'}}"></script>
	
	<script src="{{'frontend/assets/js/bootstrap-hover-dropdown.min.js'}}"></script>
	<script src="{{'frontend/assets/js/owl.carousel.min.js'}}"></script>
	{{asset('frontend/')}}
	<script src="{{'frontend/assets/js/echo.min.js'}}"></script>
	<script src="{{'frontend/assets/js/jquery.easing-1.3.min.js'}}"></script>
	<script src="{{'frontend/assets/js/bootstrap-slider.min.js'}}"></script>
    <script src="{{'frontend/assets/js/jquery.rateit.min.js'}}"></script>
    <script type="{{'frontend/text/javascript'}}" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
    <script src="{{'frontend/assets/js/bootstrap-select.min.js'}}"></script>
    <script src="{{'frontend/assets/js/wow.min.js'}}"></script>
	<script src="{{'frontend/assets/js/scripts.js'}}"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
