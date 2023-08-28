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
<title>@yield('title')</title>



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

<body>

<div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>Shipping Details</h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th> Shipping Name : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Shipping Phone : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> Shipping Email : </th>
               <th> {{ $order->email }} </th>
            </tr>

             <tr>
              <th> Division : </th>
               <th> {{ $order->division->district_name }} </th>
            </tr>

             <tr>
              <th> District : </th>
               <th> {{ $order->district->Division_name }} </th>
            </tr>

             <tr>
              <th> State : </th>
               <th>{{ $order->state->area_name }} </th>
            </tr>

            <tr>
              <th> Post Code : </th>
               <th> {{ $order->post_code }} </th>
            </tr>

            <tr>
              <th> Order Date : </th>
               <th> {{ $order->order_date }} </th>
            </tr>

           </table>


         </div> 

        </div>

      </div> <!-- // end col md -5 -->


<div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>Order Details
<span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
          </div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th>  Name : </th>
               <th> {{ $order->user->name }} </th>
            </tr>

             <tr>
              <th>  Phone : </th>
               <th> {{ $order->user->phone }} </th>
            </tr>

             <tr>
              <th> Payment Type : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> Tranx ID : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>

             <tr>
              <th> Invoice  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> Order Total : </th>
               <th>{{ $order->amount }} </th>
            </tr>

            <tr>
              <th> Order : </th>
               <th>   
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
            </tr>



           </table>


         </div> 

        </div>

      </div> <!-- // 2ND end col md -5 -->


      <div class="row">



<div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>

              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Image</label>
                </td>

                <td class="col-md-1">
                  <label for=""> Product Name </label>
                </td>

                <td class="col-md-1">
                  <label for=""> Product Code</label>
                </td>


                <td class="col-md-1">
                  <label for=""> Color </label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Size </label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Quantity </label>
                </td>

                <td class="col-md-1">
                  <label for=""> Price </label>
                </td>

              </tr>


              @foreach($orderItem as $item)
       <tr>
                <td class="col-md-1">
                <label for=""><img src="{{ asset($item->product->pro_thumbnail) }}" height="50px;" width="50px;"> </label>
                 
                </td>

                <td class="col-md-1">
                  <label for=""> {{ $item->product->proname_eng}}</label>
                </td>


                 <td class="col-md-1">
                  <label for=""> {{ $item->product->pro_code }}</label>
                </td>

                <td class="col-md-1">
                  <label for=""> {{ $item->color }}</label>
                </td>

                <td class="col-md-1">
                  <label for=""> {{ $item->size }}</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> {{ $item->qty }}</label>
                </td>

          <td class="col-md-1">
                  <label for=""> {{ $item->price }}  (  {{ $item->price * $item->qty}} ) </label>
                </td>

              </tr>
              @endforeach
            </tbody>

          </table>

        </div>
       </div> <!-- / end col md 8 -->

      </div> <!-- // END ORDER ITEM ROW -->

       @if($order->status === 'delivered')
       
       <div class='row'>
        <form action="{{route('reason.post',$order->id)}}" method='post'>
          @csrf

       <div class='col-md-8' style='padding-bottom:30px; padding-left:40px' placeholder="order return reson">
        <label for="">Order Return Reasons</label><br>
          <textarea name="reason" id="" cols="120" rows="8" max='100'></textarea>
          <input class='btn btn-primary'  type="submit" value="submit reason">

        </div>

        </form>

      </div>

       @else           
      

       @endif
     
       @if($order->status === 'return')

       <h1>your return request has been approved our tem to contact you</h1>

       @else

       @endif
        
    


    
</body>
</html>



