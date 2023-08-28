<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>



<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script src="https://js.stripe.com/v3/"></script>

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.Header')

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
    
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      <!-- ============================================== CONTENT ============================================== -->



      <div class="container">
		<div class="checkout-box ">
			<div class="row">





				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Shopping Amount </h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">


<hr>
		 <li>
		 	@if(Session::has('coupon'))

<strong>SubTotal: </strong> ${{ $cartTotal }} <hr>

<strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>

 <strong>Coupon Discount : </strong> {{ session()->get('coupon')['discount_amount'] }} 
 <hr>

  <strong>Grand Total : </strong> {{ session()->get('coupon')['total_amount'] }} 
 <hr>


		 	@else

<strong>SubTotal: </strong> {{ $cartTotal }} <hr>

<strong>Grand Total : </strong> {{ $cartTotal }} <hr>


		 	@endif 

		 </li>



				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div> <!--  // end col md 6 -->







	<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Select Payment Method</h4>
		    </div>

            <form action="{{route('cash.post')}} " method="post" id="payment-form">
                            @csrf

                            <input name="name" type="hidden" value="{{$data['shipping_name']}}">
                            <input name="email" type="hidden" value="{{$data['shipping_email']}}">
                            <input name="phone" type="hidden" value="{{$data['shipping_phone']}}">
                            <input name="post_code" type="hidden" value="{{$data['post_code']}}">
                            <input name="state_id" type="hidden" value="{{$data['state_id']}}">
                            <input name="division_id" type="hidden" value="{{$data['district_id']}}">
                            <input name="district_id" type="hidden" value="{{$data['division_id']}}">
                            <input name="notes" type="hidden" value="{{$data['notes']}}">
                          




                        <div class="form-row">
                          
                        <br>
                        <button class="btn btn-primary">Submit Payment On Cash On Delivery</button>
                        </form>


		 

		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div><!--  // end col md 6 -->
 </div>







</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->










      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 
{{asset('')}}

frontend
<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>








