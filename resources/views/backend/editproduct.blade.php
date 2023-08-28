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
			  <h4 class="box-title">Edit Products</h4>
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
					<form  method='post' action="{{route('pro.update.post',$pro->id)}}" enctype='multipart/form-data'>
                     @csrf   
					  <div class="row">
                      <input type="hidden" value="{{$pro->pro_thumbnail}}" name='old_image'>



                      <div class="form-group col-4">
								<h5>Add Brand <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="bname" id="select" required class="form-control">
                                  
                                    @foreach($brand as $data)
										<option value="{{$data->id}}" {{($data->id == $pro->brand_id)? 'selected': ''}}>{{$data->name_eng}}</option>
                                    @endforeach    
                                        
										
									
									</select>
								</div>
							</div>

                      <div class="form-group col-4">
								<h5>Add Category  <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="catname" id="select" required class="form-control">
                                  
                                    
									@foreach($cat as $data)
										<option value="{{$data->id}}" {{($data->id == $pro->cat_id)? 'selected': ''}}>{{$data->catnam_eng}}</option>
                                    @endforeach   
                                        
										
									
									</select>
								</div>
							</div>

                            <div class="form-group col-4">
								<h5>Add Sub Category  <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subname" id="select" required class="form-control">
                                  
                                    
									@foreach($subcat as $data)
										<option value="{{$data->id}}" {{($data->id == $pro->subcat_id)? 'selected': ''}}>{{$data->subcatname_eng}}</option>
                                    @endforeach   
                                        
										
									
									</select>
								</div>
							</div>

                            <div class="form-group col-4">
								<h5>Add Sub SubCategory  <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="Subsubname" id="select" required class="form-control">
                                  
                                    @foreach($subsub as $data)
										<option value="{{$data->id}}" {{($data->id == $pro->Subsub_id)? 'selected': ''}}>{{$data->sub_eng}}</option>
                                    @endforeach   
										
                                        
										
									
									</select>
								</div>
							</div>
                            
                            <div class="form-group col-4">
								<h5>Add Product eng Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="{{$pro->proname_eng}}" name="pnameng" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product urdu name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="{{$pro->proname_urdu}}" name="pnameurdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product Code <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="{{$pro->pro_code}}" name="pcode" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product Quantity  <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="{{$pro->pro_qty}}" name="pqty" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product eng tags <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="{{$pro->protags_eng}}" name="ptagseng" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product urdu tags  <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="{{$pro->protags_urdu}}" name="ptagsurdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>add product eng Size <span class="text-danger">*</span></h5>
								<div class="controls">
									<input value="{{$pro->prosize_eng}}"  type="text" name="psizeng"  class="form-control"> </div>
                                    
							</div>

                            <div class="form-group col-4">
								<h5>Add Product urdu size <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="{{$pro->prosize_urdu}}" name="psizeurdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product eng color <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="{{$pro->procolor_eng}}" name="pclreng" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>add product urdu color <span class="text-danger">*</span></h5>
								<div class="controls">
									<input value="{{$pro->procolor_urdu}}"  type="text" name="pclrurdu" id='image'  class="form-control"> </div>
                                    
							</div>

                            <div class="form-group col-4">
								<h5>Add Product selling price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="{{$pro->selling_price}}" name="psel" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Product discount price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="{{$pro->discount_price}}" name="pdis" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>Add Short des eng <span class="text-danger">*</span></h5>
								<div class="controls">
									<input value="{{$pro->shortdesc_eng}}"  type="text" name="pshorteng" id='image'  class="form-control"> </div>
                                    
							</div>

                            <div class="form-group col-4">
								<h5>Add Short des Urdu <span class="text-danger">*</span></h5>
								<div class="controls">
									<input value="{{$pro->shortdesc_urdu}}"  type="text" value="" name="pshorturdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                            <div class="form-group col-4">
								<h5>add Long des eng <span class="text-danger">*</span></h5>
								<div class="controls">
									<input value="{{$pro->longdesc_eng}}"  type="text" name="plongeng" id='image'  class="form-control"> </div>
                                    
							</div>

                            <div class="form-group col-4">
								<h5>Add Long des Urdu <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" value="{{$pro->longdesc_urdu}}" name="plongurdu" class="form-control" required data-validation-required-message="This field is required"> </div>
								
							</div>

                        

                            <div class="form-group col-6">
								<h5>Add product Main Thumbnail <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="file" name="timage" id='iimag'  class="form-control"> </div>
                                    
							</div>
                            <div class="col-6 mt-1 mb-3">
                                <img style='width:100px; Height:100px; border-radius:30px' src="{{asset($pro->pro_thumbnail)}}" id='newimage' alt="">

                            </div>
                         


                         

                           

                            <div class="form-group col-4">
								<fieldset>
                                    <input id='checkbox1' type="checkbox" value="1" {{($pro->hot_deals == 1)? 'checked': '' }} name='hot_deals'>
                                    <label for="checkbox1">Hot Deals</label>
                                </fieldset>

                                <fieldset>
                                    <input id='checkbox2' type="checkbox" value="1" {{($pro->featured == 1)? 'checked': '' }} name='featured'>
                                    <label for="checkbox2">Featured</label>
                                </fieldset>
                                    
							</div>
                           
                            <div class="form-group col-4">
								<fieldset>
                                    <input id='checkbox3' type="checkbox" value="1" {{($pro->special_offer == 1)? 'checked': '' }} name='special_offer'>
                                    <label for="checkbox3">Special Offer</label>
                                </fieldset>

                                <fieldset>
                                    <input id='checkbox4' type="checkbox" value="1" {{($pro->special_deal == 1)? 'checked': '' }} name='special_deals' >
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
          </form>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  </div>
      <section class="content">
		  <div class="row">
			  
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit MultiImage Product</h3>
				</div>
				<!-- /.box-header -->

                <form  method='post' action="{{route('pro.image')}}" enctype='multipart/form-data'>
                    @csrf
                <div class='row' style='margin-top:20px; margin-left:20px'>

                
                @foreach($mimage as $img )
               
               <div class="form-group col-3">
								
								<img style="height='140px'; width:140px;" src="{{asset($img->photo_name)}}" alt="error"><br>
                                <a style="margin-top:12px;" class='btn btn-primary' href="{{route('pro.mimage.del',$img->id)}}">Del Image</a> <br>

                                <label style="margin-top:12px;" for="">Change Image</label>
                                <div class="form-group">
								<div class="controls">
									<input  type="file" name="mimg[{{ $img->id }}]" id='iimag'  class="form-control"> </div>
                                    
							</div>

                                </div>
                                    
							
                 @endforeach
                 </div>

                 <input class='btn btn-primary' type="submit" value="update Image">
                </form>

            </section>
		  </div>
			  
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