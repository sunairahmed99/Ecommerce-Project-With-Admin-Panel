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






    <div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->

    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">	
                
            <form action="{{route('checkout.post')}}" method='post'>
            @csrf    

				<!-- guest-login -->
                
                <div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle">Shipping Address</h4>
					
						<div class="form-group">
					    <label class="info-title" for="name">Your Name <span>*</span></label>
					    <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" placeholder="{{Auth::user()->name}}" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="email">Your Email <span>*</span></label>
					    <input name="email" type="email" class="form-control unicase-form-control text-input" id="email" placeholder="{{Auth::user()->email}}" required>
					  </div>

                      <div class="form-group">
					    <label class="info-title" for="number">Your Phone <span>*</span></label>
					    <input name="phone" type="number" class="form-control unicase-form-control text-input" id="number" placeholder="{{Auth::user()->phone}}" required>
					  </div>

                      <div class="form-group">
					    <label class="info-title" for="code">Postal Code <span>*</span></label>
					    <input name='code' type="text" class="form-control unicase-form-control text-input" id="code" placeholder="" required>
					  </div>

					 
				</div>	
				
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">

                <div class="form-group col-12" style='margin-top:30px'>
								<h5>Division Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division" id="select" required class="form-control">
                                    <option value="" selected="" disable="">Select District name</option>
                                        @foreach($Division as $data)
										<option value="{{$data->id}}" >{{$data->Division_name}}</option>
                                        @endforeach
										
									
									</select>
								</div>
							</div>

                            <div class="form-group col-12">
								<h5>District Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="district" id="select" required class="form-control">
                                        
									</select>
								</div>
							</div>

                            <div class="form-group col-12">
								<h5>State Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="state" id="select" required class="form-control">
                                    
									</select>
								</div>
							</div>

                            <label for="">Notes</label>
                            <textarea  name="notes" rows="5" cols="40" style="resize: none;">

                            </textarea>
						
					  
					  
					
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- End checkout-step-01  -->




					</div><!-- /.checkout-steps -->
				</div>




				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
        <div class="checkout-progress-sidebar ">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                    </div>
                    <div class="">
                        <ul class="nav nav-checkout-progress list-unstyled">

					@foreach($carts as $item)
					<li> 
						<strong>Image: </strong>
						<img src="{{ asset($item->options->img) }}" style="height: 100px; width: 100px;">
					</li>

					<li style='margin-top:20px; padding-left:10px'> 
						<strong>Qty: </strong>
						 ( {{ $item->qty }} )

						 <strong>Color: </strong>
						 {{ $item->options->color }}

						 <strong>Size: </strong>
						 {{ $item->options->size }}
					</li>
                    @endforeach 
<hr>
		 <li>
		 	@if(Session::has('coupon'))

<strong>SubTotal: </strong> ${{ $cartTotal }} <hr>

<strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>

 <strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
 <hr>

  <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
 <hr>


		 	@else

<strong>SubTotal: </strong> ${{ $cartTotal }} <hr>

<strong>Grand Total : </strong> ${{ $cartTotal }} <hr>


		 	@endif 

		 </li>



				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->

        




</div>


<div class='row' style='margin-left:793px;margin-top:-80px; margin-bottom:30px; padding-top:20px;padding-bottom:10px; background-color:white; width:360px'>
<div class='body col-md-12'>

<h4 class='text-center' style='font-weight:bold'>Select Payment Method</h4>
<div style='margin-top:40px'>

<label style='font-weight:bold;  padding-left:60px'  for="stripe">Stripe</label>
<input id="stripe" type="radio" value='stripe' name="payment" required>
<label style='font-weight:bold; padding-left:15px'  for="Card">Card</label>
<input id="Card" type="radio" value='card' name="payment" required>
<label style='font-weight:bold;padding-left:15px '  for="Cash">Cash</label>
<input id="Cash" type="radio" value="cash" name="payment" required>

<button style='margin-top:20px' class='btn btn-primary'>CheckOut</button>

</div>



</div>
    

</div>

</form>


      

















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

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })

  $(document).ready(function(){

    $('select[name="division"]').on('change', function(){

        var division = $(this).val();

        if(division){
            
            $.ajax({
                url:"/division/view/"+division,
                type:'Get',
                dataType:'json',
                success:function(data){
                    console.log(data)

                    $('select[name="state"]').empty()
                    $('select[name="district"]').empty()
                    $.each(data.area, function(key,value){
                        console.log(value.district_name)
                        $('select[name="district"]').append('<option value="'+value.id+'">'+value.district_name+'</option>')
                    })
                }
            })
        }
    })

    $('select[name="district"]').on('change',function(){
        var dis = $(this).val();
        console.log('helllllllllooooooo',dis);

        $.ajax({
            url:'/state/view/'+dis,
            type:'Get',
            dataType:'json',
            success:function(data){
                
                $('select[name="state"]').empty()    
            $.each(data.state, function(key,value){

            $('select[name="state"]').append('<option value="'+value.id+'">'+value.area_name+'</option>')

            })    

            }
        })




    })




  })

  
   
  











  function proview(id){

    $.ajax({
      type: 'GET',
      url: '/product/view/model/'+id,
      dataType: 'json',
      success: function(data) {
        $('#pname').text(data.product.proname_eng);
        $('#ppr').text(data.product.proname_eng);
        $('#pdis').text(data.product.discount_price);
        $('#pcode').text(data.product.pro_code);
        $('#pcat').text(data.product.category.catnam_eng);
        $('#pbrand').text(data.product.brand.name_eng);
        $('#pimage').attr('src','/'+data.product.pro_thumbnail);
        $('#product_id').val(id);
        $('#qty').val(1);

        $('select[name="color"]').empty();
        $.each(data.color,function(key,value){
          $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>')

          if(data.color==''){
            $('colorhide').hide()
          }
          else{
            $('colorhide').show()

          }
        })


        $('select[name="size"]').empty();
        $.each(data.size,function(key,value){
          $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>')

          if(data.size==''){
            $('sizehide').hide()
          }
          else{
            $('sizehide').show()
          }
        })

        if(data.product.discount_price == null){
          $('#pprice').text('');
          $('#pnewprice').text('');
          $('#pprice').text('');
        }
        else{
          $('#pprice').text(data.product.selling_price);
          $('#pnewprice').text(data.product.newprice);
        }

        if(data.product.pro_qty > 0 ){
          $('#pqty').text(data.product.pro_qty);
        

}
else{
  $('#available').text('Out Of Stock')
}       
      }
    });
  }


  function addtocart(){

    var proname = $('#pname').text();
    var id = $('#product_id').val();
    var color = $('#color option:selected').text();
    var size = $('#size option:selected').text();
    var qty = $('#qty').val();

    $.ajax({
      type: 'POST',
      dataType:'json',
      data:{
        color:color, size:size, qty:qty, proname:proname
      },
      url: "/cart/data/store/"+id,

      success:function(data){
        $('#closemodel').click();
       // console.log(data)
       minicart();

        const sweetalert = Swal.mixin({
        position: 'top-end',
        toast:true,
        icon: 'success',
        showConfirmButton: false,
        timer: 2000,
})

    if($.isEmptyObject(data.error)){

      sweetalert.fire({
        type:'success',
        title:'Your item has been added successfully',
      })    
            }
            else{
              sweetalert.fire({
              type:'error',
              title:' something went wrong Your item has not been added successfully',
      })   
              
            }



      }
    })


  }

  function cart(){
    $.ajax({
      type: "Get",
      url: "/cart/page/view",
      dataType: "json",
      success: function (response) {
        console.log('check the value')
        console.log(response)
        console.log(response.cartotal)
        console.log(response.cartqty)

        $('#subtotal').text(response.cartotal);
        $('#cartqty').text(response.cartqty);
    
        var miniwish = '';

        $.each(response.carts, function(key,value){
            console.log(response.carts)
            console.log('carts')
          miniwish += `  
          <tr>
					<td class="col-md-2" style='margin-left:20px'><img src="/${value.options.img}" alt="imga"></td>
					<td class="col-md-7" style='margin-left:20px'>
						<div class="product-name"><a href="/pro/detail/${value.id}/${value.options.slug_eng}">${value.name}</a></div>
						<div class="rating">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( 06 Reviews )</span>
						</div>
						<div class="price">

            ${value.discount == null ?
              `${value.options.oldprice}` :

              `
              ${value.price}
              <span>${value.options.oldprice}</span>`
            
            
            }
							
						</div>
					</td>

                    <td class="col-md-2">

                    ${value.options.color == null ?
                        `` :
                        `<span>${value.options.color}</span>`
                    }
					</td>

                    <td class="col-md-2">

                        ${value.options.color == null ?
                            `` :
                            `<span>${value.options.size}</span>`
                        }
                        </td>

                        <td class="col-md-2" style='display:flex; margin-top:35px'>

                        <button id='${value.rowId}' onclick="deccart(this.id)">-</button>
                        <input type="number" value="${value.qty}" min='1' max='1000' style='width:40px; padding-left:10px'>
                    
                        <button id="${value.rowId}" onclick="inccart(this.id)">+</button>


                        </td>
                        
                        <td>

                        <span>${value.subtotal}</span>
                        </td>
                       

					<td class="col-md-2">
          <button  class="btn btn-primary icon" type="button" title='Add Cart' data-toggle="modal" data-target="#exampleModal"  id="${value.pro_id}" onclick="proview(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
					</td>
					<td class="col-md-1 close-btn">
          <button id="${value.rowId}" onclick='removecart(this.id)'>
						<i class="fa fa-times"></i>
            </button>
					</td>
				</tr>

       

        <br>
       
        
          
          `
        });

      

        $('#cart').html(miniwish)

      }
    });
  }

  cart();

  

  



  function addtowhish(pro_id){

    console.log(pro_id);

    $.ajax({
      type: 'POST',
      dataType:'json',
      url: "/add/whishlist/"+pro_id,

      success:function(data){

        minicart();

        const sweetalert = Swal.mixin({
        position: 'top-end',
        toast: true,
        
        showConfirmButton: false,
        timer: 1500
})

        if($.isEmptyObject(data.error)){

          sweetalert.fire({
            icon: 'success',
            type:'success',
            title: 'your item has been added in whishlist',

          })

        

        }
        else{

          sweetalert.fire({
            icon: 'error',
            type:'error',
            title: 'your item already in whishlist'
          })
          
        }

      }
    })

  }


  function minicart(){
    $.ajax({
      type: "Get",
      url: "/product/mini/cart",
      dataType: "json",
      success: function (response) {
        console.log(response.carts)

        $(`span[id='subtotal']`).text(response.cartotal);
        $('#cartcount').text(response.cartqty);

        var minicart = '';

        $.each(response.carts, function(key,value){
          minicart += `
          <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.options.img}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="">${value.name}</a></h3>
                      <div class="price">${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> <button type='submit' id="${value.rowId}" onclick="delitem(this.id)">
                    <i class="fa fa-trash"></i>  </button> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
          `
        });

        $('#minicart').html(minicart)

      }
    });
  }

  minicart();


  function removecart(id){
    console.log('cliced')
    

    $.ajax({
      type:'Get',
      url:'/delete/cartdetail/cart/'+id,
      dataType:'json',
    
      success: function(data){

        cart();
        minicart();
        const sweetalert = Swal.mixin({
        position: 'top-end',
        toast:true,
        icon: 'success',
        showConfirmButton: false,
        timer: 2000,
})

    if($.isEmptyObject(data.error)){

      sweetalert.fire({
        type:'success',
        title:'Your item has been removed successfully',
      })    
            }
            else{
              sweetalert.fire({
              type:'error',
              title:' something went wrong Your item has not been removed successfully',
      })   
              
            }
      }
    })
  }


  function delitem(rowId){
    

    $.ajax({
      type: "Get",
      url: '/minicart/pro/del/'+rowId,
      dataType: 'json',
      success: function (data) {

        minicart();

        const sweetalert = Swal.mixin({
        position: 'top-end',
        toast:true,
        icon: 'success',
        showConfirmButton: false,
        timer: 2000,
})

    if($.isEmptyObject(data.error)){

      sweetalert.fire({
        type:'success',
        title:'Your item has been deleted successfully',
      })    
            }
            else{
              sweetalert.fire({
              type:'error',
              title:' something went wrong Your item has not been added successfully',
      })   
              
            }
        
      }
    });
  }


  function inccart(id){
    
    $.ajax({
        type:'Get',
        url:'/inc/added/'+id,
        dataType:'json',
        success:function(data){

            cart();
        minicart();
            
        const sweetalert = Swal.mixin({
        position: 'top-end',
        toast:true,
        icon: 'success',
        showConfirmButton: false,
        timer: 2000,
})

    if($.isEmptyObject(data.error)){

      sweetalert.fire({
        type:'success',
        title:'Your item has been updated successfully',
      })    
            }
            else{
              sweetalert.fire({
              type:'error',
              title:' something went wrong Your item has not been added successfully',
      })   
              
            }
        }
       
    })
  }


  function deccart(id){
    
    $.ajax({
        type:'Get',
        url:'/dec/added/'+id,
        dataType:'json',
        success:function(data){

            cart();
        minicart();
            
        const sweetalert = Swal.mixin({
        position: 'top-end',
        toast:true,
        icon: 'success',
        showConfirmButton: false,
        timer: 2000,
})

    if($.isEmptyObject(data.error)){

      sweetalert.fire({
        type:'success',
        title:'Your item has been updated successfully',
      })    
            }
            else{
              sweetalert.fire({
              type:'error',
              title:' something went wrong Your item has not been added successfully',
      })   
              
            }
        }
       
    })
  }















</script>













