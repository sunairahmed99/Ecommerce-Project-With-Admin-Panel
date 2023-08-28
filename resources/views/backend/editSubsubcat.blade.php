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
			  <h4 class="box-title">Edit Sub SubCategories</h4>
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
					<form  method='post' action="{{route('sub.subcat.update', $data->id)}}" enctype='multipart/form-data'>
                     @csrf   
					  <div class="row">
                      <input type="hidden" value="{{$data->image}}" name='old_image'>

                     
                            
                            <div class="form-group col-3">
								<h5>Edit Sub subcat Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="{{$data->sub_eng}}" name="ceng" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-3">
								<h5>Edit Sub subcat Name urdu <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="{{$data->sub_urdu}}" name="curdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-3">
								<h5>Edit Sub subcat Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input value="{{$data->sub_urdu}}"  type="file" name="image" id='image'  class="form-control"> </div>
                                    
							</div>
                            <div class="col-3 mt-3">
                                <img style='width:100px; Height:100px; border-radius:30px' src="{{(!empty($data->image)? asset($data->image): url('upload/no_image.jpg'))}}" id='newimage' alt="">

                            </div>

                            <div class="form-group col-4">
								<h5>Edit Sub Category Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subname" id="select" required class="form-control">
                                  
                                        @foreach($sub as $data)
										<option value="{{$data->id}}" {{($data->id == $data->sub_id) ? 'selected': ''}} >{{$data->subcatname_eng}}</option>
                                        @endforeach
										
									
									</select>
								</div>
							</div>



                            <div class="form-group col-4">
								<h5>Edit Category Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="catname" id="select" required class="form-control">
                                  
                                        @foreach($cat as $data)
										<option value="{{$data->id}}" {{($data->id == $data->cat_id) ? 'selected': ''}} >{{$data->catnam_eng}}</option>
                                        @endforeach
										
									
									</select>
								</div>
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