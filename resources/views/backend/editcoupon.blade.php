@extends('backend.admin_master')

@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			<div class="col-12">

            <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Coupons</h4>
              @if($errors->any())
              <div>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
              </div>
              @endif
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col-12">
					<form  method='post' action="{{route('coupon.update',$coupon->id)}}" enctype='multipart/form-data'>
                     @csrf   
					  <div class="row">
                      
                            
                            <div class="form-group col-3">
								<h5>Edit Coupon Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="{{$coupon->coupon_name}}" name="cname" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-3">
								<h5>Edit  Coupon Discount <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="{{$coupon->copon_discount}}" name="cdis" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-3">
								<h5>Edit Coupon Validity <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="date" value="{{$coupon->coupon_validity}}" name="cvalidity" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-3">
								<h5>Edit Coupon status <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="cstatus" id="status">
                                <option value='1' >Active</option>
                                <option value="0">InActive</option>
                                
                                </select>
								
							</div>
                            </div>

                            <input class='btn btn-primary' type="submit" value='Update'>
                            
                            
                            </div>

            </div>
            </div>			
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  </div>
  </div>

  <script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#newimage').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function(){
    readURL(this);
});
</script>
  @endsection