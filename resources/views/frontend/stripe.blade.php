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

            <form action="{{route('stripe.post')}} " method="post" id="payment-form">
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
                            <label for="card-element">
                            Credit or debit card
                            </label>
                             
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <br>
                        <button class="btn btn-primary">Submit Payment</button>
                        </form>


		 

		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div><!--  // end col md 6 -->







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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id='closemodel'>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class='row'>

      <div class='col-md-4'>
      <div class="card" style="width: 18rem;">
  <img src="" class="card-img-top" alt="..." id='pimage' style='width:200px; height:250px'>
  
</div>
      </div>
      <div class='col-md-4'>
      <ul class="list-group">
  <li class="list-group-item">Product Price: <strong id='pprice'></strong></li>
  <li class="list-group-item">Product Price Dis:<strong id='pdis'></strong>%</li>
  <li class="list-group-item">Product Price After Dis:<strong id='pnewprice'></strong></li>
  <li class="list-group-item">Product Code: <strong id='pcode'></strong></li>
  <li class="list-group-item">Category: <strong id='pcat'></strong></li>
  <li class="list-group-item">Brand: <strong id='pbrand'></strong></li>
  <li class="list-group-item">Stock: <strong id='pqty'></strong> <strong id='available'></strong></li>
</ul>

      </div>
      <div class='col-md-4' id='colorhide'>
      <div class="form-group">
    <label for="color">Choose Color</label>
    <select class="form-control" id="color" name='color'>
          
    </select>
  </div>

  <div class="form-group" id='sizehide'>
    <label for="size">Choose Size</label>
    <select class="form-control" id="size" name='size'>
    
     
    </select>
  </div>

  <div class="form-group">
    <label for="qty">QUantity</label>
    <input type="number" class="form-control" id="qty" min='1' value='1'>
  </div>

  <input type="hidden" id='product_id'>
  <button type='submit' class='btn btn-primary'  onclick="addtocart()">Add To Cart</button>

      </div>
      </div>
      </div>
     
    </div>
  </div>
</div>
<script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51Mh7VzHd2K7SQ05w5PvuvQG1jj2PmpmRsnKCVW2elVtm8iBhriC8kMqS5C9lQxHvdZ6N3n84Pjivr07dJTGGe9rb001V6576MS');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}
</script>






