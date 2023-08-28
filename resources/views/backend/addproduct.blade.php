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
			  <h4 class="box-title">Edit Sub Categories</h4>
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
					<form  method='post' action="{{route('pro.add.post')}}" enctype='multipart/form-data'>
                     @csrf   
					  <div class="row">
                      <input type="hidden" value="" name='old_image'>



                      <div class="form-group col-4">
								<h5>Add Brand <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="bname" id="select" required class="form-control">
                                  
                                    @foreach($brand as $data)
										<option value="{{$data->id}}">{{$data->name_eng}}</option>
                                    @endforeach    
                                        
										
									
									</select>
								</div>
							</div>

                      <div class="form-group col-4">
								<h5>Add Category  <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="catname" id="select" required class="form-control">
                                  
                                    
									@foreach($cat as $data)
										<option value="{{$data->id}}">{{$data->catnam_eng}}</option>
                                    @endforeach   
                                        
										
									
									</select>
								</div>
							</div>

                            <div class="form-group col-4">
								<h5>Add Sub Category  <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subname" id="select" required class="form-control">
                                  
                                    
									@foreach($subcat as $data)
										<option value="{{$data->id}}">{{$data->subcatname_eng}}</option>
                                    @endforeach   
                                        
										
									
									</select>
								</div>
							</div>

                            <div class="form-group col-4">
								<h5>Add Sub SubCategory  <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="Subsubname" id="select" required class="form-control">
                                  
                                    @foreach($subsub as $data)
										<option value="{{$data->id}}">{{$data->sub_eng}}</option>
                                    @endforeach   
										
                                        
										
									
									</select>
								</div>
							</div>
                            
                            <div class="form-group col-4">
								<h5>Add Product eng Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="" name="pnameng" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product urdu name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="" name="pnameurdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product Code <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="" name="pcode" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product Quantity  <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="" name="pqty" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product eng tags <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="" name="ptagseng" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product urdu tags  <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="" name="ptagsurdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>add product eng Size <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="psizeng"  class="form-control"> </div>
                                    
							</div>

                            <div class="form-group col-4">
								<h5>Add Product urdu size <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="" name="psizeurdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product eng color <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="" name="pclreng" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>add product urdu color <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="pclrurdu" id='image'  class="form-control"> </div>
                                    
							</div>

                            <div class="form-group col-4">
								<h5>Add Product selling price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="" name="psel" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product discount price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="" name="pdis" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Short des eng <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="pshorteng" id='image'  class="form-control"> </div>
                                    
							</div>

                            <div class="form-group col-4">
								<h5>Add Short des Urdu <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="" name="pshorturdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>add Long des eng <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="plongeng" id='image'  class="form-control"> </div>
                                    
							</div>

                            <div class="form-group col-4">
								<h5>Add Long des Urdu <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="" name="plongurdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>add product Multiple Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="file" name="mimage[]" id='image'  class="form-control" multiple=""> </div>
                                    
							</div>

                            <div class="form-group col-4">
								<h5>add product Main Thumbnail <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="file" name="image" id='iimag'  class="form-control"> </div>
                                    
							</div>
                            <div class="col-4 mt-1 mb-3">
                                <img style='width:100px; Height:100px; border-radius:30px' src="" id='newimage' alt="">

                            </div>
                         


                         

                           

                            <div class="form-group col-4">
								<fieldset>
                                    <input id='checkbox1' type="checkbox" value='1' name='hot_deals'>
                                    <label for="checkbox1">Hot Deals</label>
                                </fieldset>

                                <fieldset>
                                    <input id='checkbox2' type="checkbox" value='1' name='featured'>
                                    <label for="checkbox2">Featured</label>
                                </fieldset>
                                    
							</div>
                           
                            <div class="form-group col-4">
								<fieldset>
                                    <input id='checkbox3' type="checkbox" value='1' name='special_offer'>
                                    <label for="checkbox3">Special Offer</label>
                                </fieldset>

                                <fieldset>
                                    <input id='checkbox4' type="checkbox" value='1' name='special_deals'>
                                    <label for="checkbox4">Special Deals</label>
                                </fieldset>
                                    
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

$("#iimag").change(function(){
    readURL(this);
});
</script>
  @endsection