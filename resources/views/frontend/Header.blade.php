<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">

          @if(Auth::check())
          <li><a href="{{route('whish.list')}}"><i class="icon fa fa-heart"></i>
            @if(session()->get('language') == 'urdu') خواہش کی فہرست @else Wishlist   @endif
          </a></li>

          @else

          @endif

          

          <li><a href="{{route('cart.page')}}"><i class="icon fa fa-shopping-cart"></i>
             @if(session()->get('language') == 'urdu') میری گاڑی   @else My Cart   @endif
          </a></li>

         
           
           
         
            <li><a href="#"><i class="icon fa fa-check"></i>
            @if(session()->get('language') == 'urdu') چیک آؤٹ  @else checkout   @endif
          </a></li>
          @if(Auth::check())

          <li style='color:white'> {{Auth::user()->name}} </li>

          @else

          <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>
              @if(session()->get('language') == 'urdu') لاگ ان  @else login   @endif
          </a></li>

          @endif
        
          </ul>
        </div>
        <!-- /.cnt-account -->

        @if(Auth::User())
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
           
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">{{Auth::User()->name}} </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{route('user.profile')}}">My Profile</a></li>
                <li><a href="{{route('edit.profile')}}">Edit Profile</a></li>
                <li><a href="{{route('edit.pass')}}">My Password</a></li>
                <li><a href="{{route('user.order')}}">My Order</a></li>
                <li><a href="{{route('user.logout')}}">Logout</a></li>
              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled --> 
        </div>
        @endif
        
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">INR</a></li>
                <li><a href="#">GBP</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
              @if(session()->get('language') == 'urdu') اردو @else English @endif
               </span><b class="caret"></b></a>
              <ul class="dropdown-menu">

              @if(session()->get('language') == 'urdu')
              <li><a href="{{route('eng.lang')}}">English</a></li>
              @else
              <li><a href="{{route('urdu.lang')}}">Urdu</a></li>
              @endif
                
              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled --> 
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="home.html"> <img src="assets/images/logo.png" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          @php
          $scat = App\Models\categorymodel::get();
          @endphp
          <div class="search-area">
            <form>
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      @foreach($scat as $cat)
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('categories/'.$cat->id.'/'.$cat->slug_eng)}}">
                        @if(session('language') == 'urdu') {{$cat->catname_urdu}}     @else  {{$cat->catnam_eng}}      @endif
                        </a></li>
                      @endforeach
                    </ul>
                  </li>
                </ul>
                <input class="search-field" placeholder="Search here..." />
                <a class="search-button" href="#" ></a> </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count" id='cartcount'></span></div>
              <div class="total-price-basket"> <span class="lbl">cart -</span> 
              <span class="total-price"> 
              <span class="value" id='subtotal'></span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>

              <div id='minicart'>

              </div>
              <!-- ajax mini cart  -->
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price' id='subtotal'></span> </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li>  <a href="{{route('Home.pagee')}}">Home</a>  
              </li>

                @php
                $cat = App\Models\categorymodel::orderBy('catnam_eng', 'ASC')->get();
               
                @endphp

               


                @foreach($cat as $data)
                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                @if(session()->get('language') == 'urdu') {{$data->catname_urdu}}  @else {{$data->catnam_eng}} @endif
                  </a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                        @php
                $subcat = App\Models\subcatmodel::where('cat_id', $data->id)->orderBy('subcatname_eng', 'ASC')->get();
                @endphp
                          @foreach($subcat as $sub)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">
                            @if(session()->get('language') == 'urdu') {{$sub->subcatname_urdu}}  @else {{$sub->subcatname_eng}} @endif
                              </h2>
                            @php
                $Subsub = App\Models\Subsubmodel::where('sub_id', $sub->id)->orderBy('sub_eng', 'ASC')->get();
                @endphp
                            @foreach($Subsub as $Subsub)

                            @php

                            $id = App\Models\productmodel::where('Subsub_id')->get();

                            @endphp


                            <ul class="links">
                              <li><a href="{{url('Subsubcategories/'.$Subsub->id.'/'.$Subsub->slug_eng)}}">
                              @if(session()->get('language') == 'urdu') {{$Subsub->sub_urdu}}  @else {{$Subsub->sub_eng}} @endif
                                </a></li>
                          
                            </ul>
                            @endforeach
                          </div>
                          @endforeach
                        
                      <!-- /.col -->
                          
                        
                          <!-- /.col -->
                          
                          <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                          <!-- /.yamm-content --> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                @endforeach 
             
                 
              
                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>