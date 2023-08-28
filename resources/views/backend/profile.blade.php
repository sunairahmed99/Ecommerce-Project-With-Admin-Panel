@extends('backend.admin_master');

@section('admin')

<div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class="content">

        <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" >
					  <h3 class="widget-user-username"> Name: {{$data->name}}</h3>
					  <h6 class="widget-user-desc">Email: {{$data->email}}</h6>
                      <a href="{{route('admin.profile.edit', $data->id)}}" class='btn btn-primary' style="float:right" href="">Edit Profile</a>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" style="height:100px" src="{{(!empty($data->profile_photo_path)? url('upload/admin_image/'.$data->profile_photo_path): url('upload/no_image.jpg'))}}" alt="error">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-6">
						  <div class="description-block">
							<h5 class="description-header">Name</h5>
							<span class="description-text">{{$data->name}}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
					
						<!-- /.col -->
						<div class="col-sm-6">
						  <div class="description-block">
							<h5 class="description-header">Email</h5>
							<span class="description-text">{{$data->email}}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
		
		</section>
		<!-- /.content -->
	  </div>
  </div>
  @endsection