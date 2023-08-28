@extends('backend.admin_master')

@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class='content'>
        <form action="{{route('profile.pass')}}" method='post'>
         @csrf   
        <div class='row'>
       

        <h1 class='col-12 text-center mb-4'>Admin Profile Edit</h1>

       

        <div class="form-group col-4 mt-4 ">
								<h5> Admin Currrent Password <span class="text-danger"></span></h5>
								<div class="controls">
									<input type="password" name="old_password" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                          <div class="form-group col-4 mt-4 ">
								<h5> Admin New Password <span class="text-danger"></span></h5>
								<div class="controls">
									<input type="password" name="new_password" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
							<div class="form-group col-4 mt-4">
								<h5>Admin Conform Password <span class="text-danger"> </span></h5>
								<div class="controls">
									<input type="password" name="Conform_Password" data-validation-match-match="password" class="form-control" required> </div>
							</div>
                            </div>
                        
                          
                            
                            <div clas='row'>
                                
                            <input type="submit" class='btn btn-primary' value= ' Update Password'>

                            </div>
        </div>

        </form>  

        </section>
		<!-- /.content -->
	  </div>
  </div>
  
  @endsection