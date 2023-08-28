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
			  <h4 class="box-title">Edit Categories</h4>
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
					<form  method='post' action="{{route('cat.update', $data->id)}}" enctype='multipart/form-data'>
                     @csrf   
					  <div class="row">
                      <input type="hidden" value="{{$data->cat_icon}}" name='old_image'>
                            
                            <div class="form-group col-3">
								<h5>Edit Brand Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="{{$data->catnam_eng}}" name="ceng" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-3">
								<h5>Edit Brand Name urdu <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="{{$data->catname_urdu}}" name="curdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>
                          
                            

                            <div class="form-group col-3">
								<h5>Edit Brand Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="file" name="image" id='image'  class="form-control"> </div>
                                    
							</div>
                            <div class="col-3 mt-4">
                                <img style='width:100px; Height:100px; border-radius:30px' src="{{(!empty($data->cat_icon)? asset($data->cat_icon): url('upload/no_image.jpg'))}}" id='newimage' alt="">

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