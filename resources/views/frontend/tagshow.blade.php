<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
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
<body>
<!-- ============================================== HEADER ============================================== -->
@include('frontend.Header')

<!-- ============================================== HEADER : END ============================================== --> 

<!-- ====== === HEADER : END === ========== -->

<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="#">Home</a></li>
        <li class='active'>Handbags</li>
      </ul>
    </div>
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'> 
        <!-- ================================== TOP NAVIGATION ================================== -->
            @php

            $cat = App\Models\categorymodel::orderBy('catnam_eng', 'ASC')->get();
            @endphp
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
          @foreach($cat as $category)
            <ul class="nav">
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
              @if (session()->get('language') == 'urdu') {{$category->catname_urdu}}        @else {{$category->catnam_eng}}        @endif
            </a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">

                    @php
                    $subcati = App\Models\subcatmodel::where('cat_id', $category->id)->orderBy('subcatname_eng', 'ASC')->get();
                    @endphp
                      
                      <div class="col-sm-12 col-md-3">
                      @foreach($subcati as $sub)  
                        <ul class="links list-unstyled">
                          <li><a href="{{url('subcategories/'.$sub->id)}}">
                          @if(session()->get('language') == 'urdu') {{$sub->subcatname_urdu}}    @else {{$sub->subcatname_eng}}      @endif
                          </a></li>
                          
                        </ul>
                        @endforeach
                      </div>
                     
                      <!-- /.col -->
                     
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              
              
            </ul>
          @endforeach  
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== -->


        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">shop by</h3>
              <div class="widget-header">
                <h4 class="widget-title">Category</h4>
              </div>
              @php
              $cat = App\Models\categorymodel::orderBy('id', 'DESC')->get();
              @endphp
              <div class="sidebar-widget-body">
                <div class="accordion">
                  @foreach($cat as $cat)  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseOne{{$cat->id}}" data-toggle="collapse" class="accordion-toggle collapsed"> 
                    @if(session()->get('language') == 'urdu') {{$cat->catname_urdu}}    @else  {{$cat->catnam_eng}}            @endif
                    </a> </div>
                    <!-- /.accordion-heading -->
                    @php
              $subcati = App\Models\subcatmodel::where('cat_id', $cat->id)->orderBy('id', 'DESC')->get();
              @endphp
                    <div class="accordion-body collapse" id="collapseOne{{$cat->id}}" style="height: 0px;">
                      <div class="accordion-inner">
                        @foreach($subcati as $subcati)
                        <ul>
                        
                          <li><a href="#">
                          @if(session()->get('language') == 'urdu') {{$subcati->subcatname_urdu}}    @else  {{$subcati->subcatname_eng}}            @endif

                          </a></li>
                        </ul>
                        @endforeach
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  @endforeach
                  <!-- /.accordion-group -->
                  
                
                  <!-- /.accordion-group --> 
                  
                </div>
                <!-- /.accordion --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
            
            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Price Slider</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="" >
                </div>
                <!-- /.price-range-holder --> 
                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== PRICE SILDER : END ============================================== --> 
            <!-- ============================================== MANUFACTURES============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Manufactures</h4>
              </div>
              <div class="sidebar-widget-body">
                @php

                $subcatti = App\Models\subcatmodel::orderBy('id', 'DESC')->limit(4)->get();

                @endphp
                <ul class="list">
                @foreach($subcatti as $subcatti)
                  <li><a href="#">
                 @if(session()->get('language') == 'urdu')  {{$subcatti->subcatname_urdu}}  @else  {{$subcatti->subcatname_eng}}  @endif   
                    </a></li>
                  
                @endforeach  
                </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== MANUFACTURES: END ============================================== --> 
           
            <!-- ============================================== COMPARE============================================== -->
          
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COMPARE: END ============================================== --> 
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
              <h3 class="section-title">Product tags</h3>
              <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list"> 


                @if(session()->get('language') == 'urdu')

                    @foreach($tagspro as $tu)

                    <a class="item" title="Phone" href="{{url('product/tag/'.$tu->protags_urdu)}}">{{str_replace(',',' ',$tu->protags_urdu )}}</a>

                    @endforeach

                    @else

                    @foreach($tagspro as $tu)

                    <a class="item" title="Phone" href="{{url('product/tag/'.$tu->protags_eng)}}">{{str_replace(',',' ',$tu->protags_eng)}}</a>

                    @endforeach

                    @endif






                    
                    </div>
                <!-- /.tag-list --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
          <!----------- Testimonials------------->
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
              <div id="advertisement" class="advertisement">
                <div class="item">
                  <div class="avatar"><img src="{{asset('frontend/assets/images/testimonials/member1.png')}}" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">John Doe <span>Abc Company</span> </div>
                  <!-- /.container-fluid --> 
                </div>
                <!-- /.item -->
                
                <div class="item">{{asset('frontend/')}}
                  <div class="avatar"><img src="{{asset('frontend/assets/images/testimonials/member3.png')}}" alt="Image"></div>
                  <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="avatar"><img src="{{asset('frontend/assets/images/testimonials/member2.png')}}" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                  <!-- /.container-fluid --> 
                </div>
                <!-- /.item --> 
                
              </div>
              <!-- /.owl-carousel --> 
            </div>
            
            <!-- ============================================== Testimonials: END ============================================== -->
            
            <div class="home-banner"> <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

               @php

              $slider = App\Models\slidermodel::latest()->get()

              @endphp
           
            
            @foreach($slider as $sli)
            @if($sli->status == 0)  pillay @else
            <div class="item" style="background-image: url({{asset($sli->slider_image)}});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">{{$sli->title}}</div>
                  
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{$sli->desc}}</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            @endif
            @endforeach
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
     
        <div class="clearfix filters-container m-t-10" style="margin-top:40px">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Show</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                   
                 {{$subcat->links()}}
                
                </ul>
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                    @foreach($subcat as $pro)
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{url('pro/detail/'.$pro->id.'/'.$pro->slug_eng)}}"><img  src="{{asset($pro->pro_thumbnail)}}" alt=""></a> </div>
                          <!-- /.image -->
                          @php

                          $amount = $pro->selling_price - $pro->discount_price;
                          $sel = ($amount/$pro->selling_price) * 100


                          @endphp
                          
                          <div class="tag new">
                            @if($pro->selling_price == 0 or $pro->selling_price < 0 or $pro->selling_price == null)
                            <span>new</span></div>
                            @else
                            <span>{{$pro->discount_price}}%</span></div>

                            @endif
                   
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('pro/detail/'.$pro->id.'/'.$pro->slug_eng)}}">
                            @if(session()->get('language') == 'urdu') {{$pro->proname_urdu}}     @else  {{$pro->proname_eng}}    @endif
                            </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          @if($pro->selling_price == 0 or $pro->selling_price < 0 or $pro->selling_price == null)

                          <div class="product-price"> <span class="price"> {{$pro->selling_price}} </span> </div>
                          @else

                          <div class="product-price"> <span class="price"> {{$sel}} </span> <span class="price-before-discount">{{$pro->selling_price}}</span> </div>

                          @endif
                         
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  @endforeach
                  <!-- /.item -->
                  
              
                  <!-- /.item --> 
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane "  id="list-container">
              <div class="category-product">
              
                <!-- /.category-product-inner -->
                
                @foreach($subcat as $pro)
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"> <img src="{{asset($pro->pro_thumbnail)}}" alt=""> </div>
                          </div>
                          @php

                            $amount = $pro->selling_price - $pro->discount_price;
                            $sel = ($amount/$pro->selling_price) * 100


                            @endphp
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="{{url('pro/detail/'.$pro->id.'/'.$pro->slug_eng)}}">
                            @if(session()->get('language') == 'urdu') {{$pro->proname_urdu}}     @else  {{$pro->proname_eng}}    @endif</a></h3>
                            <div class="rating rateit-small"></div>

                            @if($pro->selling_price == 0 or $pro->selling_price < 0 or $pro->selling_price == null)

                                <div class="product-price"> <span class="price"> {{$pro->selling_price}} </span> </div>
                                @else

                                <div class="product-price"> <span class="price"> {{$sel}} </span> <span class="price-before-discount">{{$pro->selling_price}}</span> </div>

                                @endif

                            <!-- /.product-price -->
                            <div class="description m-t-10">
                            @if(session()->get('language') == 'urdu') {{$pro->longdesc_urdu}}     @else  {{$pro->longdesc_eng}}    @endif
                            </div>
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                  <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                </ul>
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                            
                          </div>
                          <!-- /.product-info --> 
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-list-row -->
                      <div class="tag sale"><span>sale</span></div>
                    </div>
                    <!-- /.product-list --> 
                  </div>
                  <!-- /.products --> 
                </div>
                @endforeach
                <!-- /.category-product-inner -->
                
               
                <!-- /.category-product-inner --> 
                
              </div>
              <!-- /.category-product --> 
            </div>
            <!-- /.tab-pane #list-container --> 
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                

              {{$subcat->links()}}   

                 
                </ul>
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.brands')
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
  <!-- /.container --> 
  
</div>
<!-- /.body-content --> 













<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Contact Us</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>+(888) 123-4567<br>
                    +(888) 456-7890</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span><a href="#">flipmart@themesground.com</a></span> </div>
              </li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Customer Service</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="#" title="Contact us">My Account</a></li>
              <li><a href="#" title="About us">Order History</a></li>
              <li><a href="#" title="faq">FAQ</a></li>
              <li><a href="#" title="Popular Searches">Specials</a></li>
              <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Corporation</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="Your Account" href="#">About us</a></li>
              <li><a title="Information" href="#">Customer Service</a></li>
              <li><a title="Addresses" href="#">Company</a></li>
              <li><a title="Addresses" href="#">Investor Relations</a></li>
              <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Why Choose Us</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
              <li><a href="#" title="Blog">Blog</a></li>
              <li><a href="#" title="Company">Company</a></li>
              <li><a href="#" title="Investor Relations">Investor Relations</a></li>
              <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-6 no-padding social">
        <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
          <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
          <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
          <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="assets/images/payments/1.png" alt=""></li>
            <li><img src="assets/images/payments/2.png" alt=""></li>
            <li><img src="assets/images/payments/3.png" alt=""></li>
            <li><img src="assets/images/payments/4.png" alt=""></li>
            <li><img src="assets/images/payments/5.png" alt=""></li>
          </ul>
        </div>
        <!-- /.payment-methods --> 
      </div>
    </div>
  </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
</body>
</html>