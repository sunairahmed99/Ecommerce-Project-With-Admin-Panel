<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>EasyShop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               EasyShop Head Office
               Email:sunairahmed9908@gmail.com<br>
               Mob: 03082011585 <br>
               Karachi <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{$orders->name}}  <br>
           <strong>Email:</strong> {{$orders->email}} <br>
           <strong>Phone:</strong> {{$orders->phone}} <br>
            
           <strong>Address:</strong> {{$orders->state->area_name}}, {{$orders->division->district_name}},{{$orders->district->Division_name}},  <br>
           <strong>Post Code:</strong> {{$orders->post_code}}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Invoice:</span>{{$orders->invoice_no}}</h3>
            Order Date: {{$orders->order_date}} <br>
             Delivery Date: {{$orders->delivered_date}} <br>
            Payment Type : {{$orders->payment_method}} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>


  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">

   
      <tr class="font">
        <th>Image</th>
        <th>Product Price</th>
        <th>
            Product Size
        </th>
        <th>Product Color</th>
        <th>Product Code</th>
        <th>Product Qty</th>
        <th>Currency </th>
        <th>Product Price </th>
      </tr>
   
    </thead>
    <tbody>

    @foreach($orderItem as $item)
      <tr class="font">
        <td align="center">
           
        </td>
        <td align="center">{{$item->product->proname_eng}}</td>
        <td align="center">  @if($item->size ==null) 'null' @else {{$item->size}} @endif
            
        </td>
        <td align="center">@if($item->color ==null) 'null' @else {{$item->color}} @endif</td>
        <td align="center">{{$item->product->pro_code}}</td>
        <td align="center">{{$item->qty}}</td>
        <td align="center">price PK</td>
        <td align="center">{{$item->price}} </td>
      </tr>
    @endforeach  
      
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Subtotal:</span> {{$item->price}} PK</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>Sunair Ahmed</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>