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

<div class="container">
		<div class="row">
			

       <div class="col-md-2">
       </div>

       <div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>

              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Date</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Total</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Payment</label>
                </td>


                <td class="col-md-2">
                  <label for=""> Invoice</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> Order</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Action </label>
                </td>

              </tr>


              @foreach($orders as $order)
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $order->order_date }}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> ${{ $order->amount }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $order->payment_method }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $order->invoice_no }}</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> 
                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>

                    </label>
                </td>

         <td class="col-md-1">
          <a href="{{route('view.orders',$order->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

           <a href="{{route('view.pdf',$order->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-download" style="color: white;"></i> Invoice </a>

        </td>

              </tr>
              @endforeach





            </tbody>

          </table>

          

        </div>
       </div> <!-- / end col md 8 -->

       
    
</body>
</html>



