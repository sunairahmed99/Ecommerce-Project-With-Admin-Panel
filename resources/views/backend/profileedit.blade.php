@extends('backend.admin_master')

@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class='content'>
        <form action="{{route('admin.profile.update',$data->id)}}" method='post' enctype='multipart/form-data'>
         @csrf   
        <div class='row'>
       

        <h1 class='col-12 text-center mb-4'>Admin Profile Edit</h1>

       

            <div class="form-group col-3 mt-4">
								<h5>Edit Admin Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input value="{{$data->name}}" type="text" name="name" class="form-control"> </div>
							</div>
							<div class="form-group col-3 mt-4">
								<h5>Edit Admin Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input value="{{$data->email}}" type="email" name="email"  class="form-control"> </div>
							</div>
                           
                            <div class="col-3 mt-4">
                                <img style='width:100px; Height:100px; border-radius:30px' src="{{(!empty($data->profile_photo_path)? url('upload/admin_image/'.$data->profile_photo_path): url('upload/no_image.jpg'))}}" id='newimage' alt="">

                            </div>
                            
                            <div clas='row'>
                                
                            <input type="submit" class='btn btn-primary' value= 'Profile Update'>

                            </div>
        </div>

        </form>  

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