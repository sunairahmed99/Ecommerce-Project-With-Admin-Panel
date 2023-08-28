<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Flipmart premium HTML5 & CSS3 Template</title>





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
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.Header')

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
     
      
      <!-- ============================================== CONTENT ============================================== -->
      
      <form method="POST" action="{{ route('profile.update') }}" enctype='multipart/form-data' class="register-form outer-top-xs" role="form">
        @csrf
        <div class='row' style="background-color:blue; margin:2rem; border-radius:20px; height:300px; padding-top:20px">
		<div class="form-group col-md-4">
	    	<label style="color:white" class="info-title" for="email">Edit Name <span>*</span></label>
	    	<input type="name" name='name' value="{{Auth::user()->name}}" class="form-control unicase-form-control text-input" id="email" required autocomplete="username" >
	  	</div>
        <div class="form-group col-md-4">
		    <label style="color:white" class="info-title" for="name">Edit Email <span>*</span></label>
		    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control unicase-form-control text-input" id="name" required autocomplete="name" >
		</div>
        <div class="form-group col-md-4">
		    <label class="info-title" style="color:white" for="phone">Edit Phone Number <span>*</span></label>
		    <input type="text" name='phone' value="{{Auth::user()->phone}}" class="form-control unicase-form-control text-input" id="phone" required autocomplete="phone" >
		</div>

        <div class="form-group col-md-4" style="margin-top:30px">
		    <label class="info-title" style="color:white" for="phone">Edit Image <span>*</span></label>
		    <input id='image' type="file" name='image' value="{{Auth::user()->profile_photo_path}}" class="form-control unicase-form-control text-input"   >
		</div>
        <div class="form-group col-md-4" style="margin-top:30px">
		   <img id="img" style="width:90px; height:100px; border-radius:40px" src="{{(!empty(auth::user()->profile_photo_path))? url('upload/user_image/'.auth::user()->profile_photo_path): url(asset('upload/no_image.jpg'))}}" alt="">
		</div>

        <div class="form-group col-md-4" style="margin-top:30px">
		  <input class="btn btn-success" style="padding:15px; margin-top:30px" type="submit" value ="Profile Update">
		</div>

</div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.brands')
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

<script type="text/javascript">
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function(){
    readURL(this);
});
</script>






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
</body>
</html>



















