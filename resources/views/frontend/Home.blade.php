@extends('frontend.main_master')

@section('title')

Home Easy Online Shop

@endsection

@section('admin')

<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
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
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>

            @php
            $category = App\Models\categorymodel::orderBy('id','DESC')->limit(7)->get();
            @endphp

            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              @foreach($category as $cat)
              <li><a data-transition-type="backSlide" href="#category{{$cat->id}}" data-toggle="tab">
                @if(session()->get('language') == 'urdu') {{$cat->catname_urdu}} @else {{$cat->catnam_eng}}     @endif
                </a></li>
              @endforeach
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">


            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                @php

                $product = App\Models\productmodel::where('status', '1')->orderBy('id','DESC')->limit(4)->get();
                @endphp

                   @foreach($product as $pro)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">

                        @php

                        $price = $pro->selling_price - $pro->discount_price;

                        $afterdis = ($price/$pro->selling_price) * 100;

                        @endphp
                           
                          <div class="image"> <a href="{{url('pro/detail/'.$pro->id.'/'.$pro->slug_eng)}}"><img  src=" {{($pro->pro_thumbnail)}}" alt=""></a> </div>
                          <!-- /.image -->

                          @if($pro->discount_price < 0 or $pro->discount_price == 0 or $pro->discount_price == null )
                          <div class="tag new"><span>New</span></div>
                          @else
                          <div class="tag new"><span>{{$pro->discount_price}} %</span></div>

                          @endif
                          
                        </div>
                          
                      
                        <!-- /.product-image -->

                        
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('pro/detail/'.$pro->id.'/'.$pro->slug_eng)}}">
                          @if(session()->get('language') == 'urdu')  {{$pro->proname_urdu}}    @else  {{$pro->proname_eng}}     @endif
                          </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description">
                          @if(session()->get('language') == 'urdu')   {{$pro->shortdesc_eng}}    @else   {{$pro->shortdesc_eng}}     @endif
                            {{$pro->shortdesc_eng}}</div>

                            @if($pro->discount_price < 0 or $pro->discount_price == 0 or $pro->discount_price == null)

                          <div class="product-price"><span class="price-before-discount">{{$pro->selling_price}}</span> </div>
                          @else

                          <div class="product-price"> <span class="price"> {{$afterdis}} </span> <span class="price-before-discount" style='color:red'>{{$pro->selling_price}}</span> </div>

                          @endif

                            
                          
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
                  @endforeach()
                  <!-- /.item -->
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->

            @php

$cate =  App\Models\categorymodel::orderBy('id','DESC')->limit(7)->get();
@endphp

            @foreach($cate as $cat)
        
            <div class="tab-pane" id="category{{$cat->id}}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                @php
              

                $catwisepro = App\Models\productmodel::where('cat_id',$cat->id)->orderBy('id','DESC')->get();

                @endphp
                
                

                   @foreach($catwisepro as $pro)
          
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">

                        @php

                        $price = $pro->selling_price - $pro->discount_price;

                        $afterdis = ($price/$pro->selling_price) * 100;

                        @endphp
                           
                          <div class="image"> <a href="{{url('/pro/detail/'.$pro->id.'/'.$pro->slug_eng)}}"><img  src=" {{asset($pro->pro_thumbnail)}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          @if($pro->discount_price < 0 or $pro->discount_price == 0 or $pro->discount_price == null )
                          <div class="tag new"><span>New</span></div>
                          @else
                          <div class="tag new"><span>{{$pro->discount_price}} %</span></div>

                          @endif
                          
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('/pro/detail/'.$pro->id.'/'.$pro->slug_eng)}}">
                            @if(session()->get('language') == 'urdu')  {{$pro->proname_urdu}}    @else  {{$pro->proname_eng}}     @endif
                           </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description">
                          @if(session()->get('language') == 'urdu')   {{$pro->shortdesc_eng}}    @else   {{$pro->shortdesc_eng}}     @endif
                            {{$pro->shortdesc_eng}}</div>

                          @if($pro->discount_price < 0 or $pro->discount_price == 0 or $pro->discount_price == null)

                          <div class="product-price"><span class="price-before-discount">{{$pro->selling_price}}</span> </div>
                          @else

                          <div class="product-price"> <span class="price"> {{$afterdis}} </span> <span class="price-before-discount">{{$pro->selling_price}}</span> </div>

                          @endif
                        
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
                  @endforeach()
                  <!-- /.item -->
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            @endforeach
            
           
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                
                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner1.jpg')}}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner2.jpg')}}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
          
            <!-- /.item -->
            @foreach($feapro as $fea)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{url('pro/detail/'.$fea->id.'/'.$fea->slug_eng)}}"><img  src=" {{asset($fea->pro_thumbnail)}}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    
                    <div class="tag new">

                   
                    @if($fea->discount_price < 0 or $fea->discount_price == 0 or $fea->discount_price == null)
                    <span>new</span></div>

                    @else

                    <span>{{$fea->discount_price}}%</span></div>

                    @endif
                      
                   
                  </div>
                  <!-- /.product-image -->

                  @php

                  $price =$fea->selling_price - $fea->discount_price;
                  $selprice = ($price/$fea->selling_price) * 100; 


                  @endphp
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{url('pro/detail/'.$fea->id.'/'.$fea->slug_eng)}}">
                    @if(session()->get('language') == 'urdu') {{$fea->proname_urdu}}  @else {{$fea->proname_eng}}     @endif
                      </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($fea->discount_price < 0 or $fea->discount_price == 0 or $fea->discount_price == null)
                    <div class="product-price"> <span class="price-before-discount">800</span> </div>

                    @else

                    <div class="product-price"> <span class="price"> {{$selprice}} </span> <span class="price-before-discount"style="color:red">{{$fea->selling_price}}</span> </div>

                    @endif
                   
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button  class="btn btn-primary icon" type="button" title='Add Cart' data-toggle="modal" data-target="#exampleModal"  id="{{ $fea->id }}" onclick="proview(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                         
                        </li>
                       @if(Auth::User()):
                        <li class="lnk wishlist"> 
                          <button id = "{{$fea->id}}" style='margin-top:-5px; height:30px' class=" btn btn-primary"  title="Wishlist"  onclick='addtowhish(this.id)'> <i class="icon fa fa-heart"></i> </button> 
                        </li>
                        @else:
                          <li class="lnk wishlist"> 
                          <a href="{{route('login')}}" id = "{{$fea->id}}" style='margin-top:-5px; height:30px' class=" btn btn-primary"  title="Wishlist"  onclick='addtowhish(this.id)'> <i class="icon fa fa-heart"></i> </a> 
                        </li>
                       @endif   
                       
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                       </li>
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
            @endforeach;
            <!-- /.item -->
            
           
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END -!>


         <!- ============================================== Fashion Categories : Starts ============================================== -->
         <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'urdu') {{$cat->catname_urdu}}        @else {{$cat->catnam_eng}}     @endif
          </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
          
            <!-- /.item -->
            @foreach($fashionpro as $fea)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{url('pro/detail/'.$fea->id.'/'.$fea->slug_eng)}}"><img  src=" {{asset($fea->pro_thumbnail)}}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    
                    <div class="tag new">

                   
                    @if($fea->discount_price < 0 or $fea->discount_price == 0 or $fea->discount_price == null)
                    <span>new</span></div>

                    @else

                    <span>{{$fea->discount_price}}%</span></div>

                    @endif
                      
                   
                  </div>
                  <!-- /.product-image -->

                  @php

                  $price =$fea->selling_price - $fea->discount_price;
                  $selprice = ($price/$fea->selling_price) * 100; 


                  @endphp
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{url('pro/detail/'.$fea->id.'/'.$fea->slug_eng)}}">
                    @if(session()->get('language') == 'urdu') {{$fea->proname_urdu}}  @else {{$fea->proname_eng}}     @endif
                      </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($fea->discount_price < 0 or $fea->discount_price == 0 or $fea->discount_price == null)
                    <div class="product-price"> <span class="price-before-discount">800</span> </div>

                    @else

                    <div class="product-price"> <span class="price"> {{$selprice}} </span> <span class="price-before-discount"style="color:red">{{$fea->selling_price}}</span> </div>

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
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
            @endforeach;
            <!-- /.item -->
            
           
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== Fashion Categories : END 

         <!- ============================================== Electric Categories : Starts ============================================== -->
         <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'urdu') {{$elecat->catname_urdu}}        @else {{$elecat->catnam_eng}}     @endif
          </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
          
            <!-- /.item -->
            @foreach($elecpro as $fea)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{url('pro/detail/'.$fea->id.'/'.$fea->slug_eng)}}"><img  src=" {{asset($fea->pro_thumbnail)}}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    
                    <div class="tag new">

                   
                    @if($fea->discount_price < 0 or $fea->discount_price == 0 or $fea->discount_price == null)
                    <span>new</span></div>

                    @else

                    <span>{{$fea->discount_price}}%</span></div>

                    @endif
                      
                   
                  </div>
                  <!-- /.product-image -->

                  @php

                  $price =$fea->selling_price - $fea->discount_price;
                  $selprice = ($price/$fea->selling_price) * 100; 


                  @endphp
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{url('pro/detail/'.$fea->id.'/'.$fea->slug_eng)}}">
                    @if(session()->get('language') == 'urdu') {{$fea->proname_urdu}}  @else {{$fea->proname_eng}}     @endif
                      </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($fea->discount_price < 0 or $fea->discount_price == 0 or $fea->discount_price == null)
                    <div class="product-price"> <span class="price-before-discount">{{$fea->selling_price}}</span> </div>

                    @else

                    <div class="product-price"> <span class="price"> {{$selprice}} </span> <span class="price-before-discount"style="color:red">{{$fea->selling_price}}</span> </div>

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
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
            @endforeach;
            <!-- /.item -->
            
           
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== Electric Categories : END 
        
        
        
        
        
        
        
        
        
        ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        @php
        $slide = App\Models\slidermodel::where('status', '1')->orderBy('id', 'DESC')->limit(1)->get();
        @endphp

        @foreach($slide as $slide)
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{asset($slide->slider_image)}}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">
                    @if($slide->title == null or $slide->title == 0)
                    
                      @else
                      {{$slide->title}}
                      @endif
                      <br>
                      <span class="shopping-needs">
                      @if($slide->desc == null or $slide->desc == 0)
                      
                      @else
                      {{$slide->desc}}
                      @endif
                      </span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        @endforeach
        <!-- /.wide-banners --> 
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== BEST SELLER ============================================== -->
        @php
        $bpro = App\Models\productmodel::where('status', '1')->orderBy('id', 'DESC')->skip(4)->limit(4)->get();
        @endphp
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
            @foreach($bpro as $bpro)
              <div class="item">
              
                <div class="products best-product">
                
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{url('pro/detail/'.$bpro->id.'/'.$bpro->slug_eng)}}"> <img src="{{asset($bpro->pro_thumbnail)}}" alt=""> </a> </div>
                            <!-- /.image --> 

                              @php
                              $price =$bpro->selling_price - $bpro->discount_price;
                              $selprice = ($price/$bpro->selling_price) * 100; 
                              @endphp
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{url('pro/detail/'.$bpro->id.'/'.$bpro->slug_eng)}}">
                            @if(session()->get('language') == 'urdu') {{$bpro->proname_urdu}}  @else {{$bpro->proname_eng}}     @endif
                              </a></h3>
                            <div class="rating rateit-small"></div>
                            @if($bpro->discount_price < 0 or $bpro->discount_price == 0 or $bpro->discount_price == null)
                    <div class="product-price"> <span class="price-before-discount">{{$bpro->selling_price}}</span> </div>

                    @else

                    <div class="product-price"> <span class="price"> {{$selprice}} </span> <span class="price-before-discount"style="color:red">{{$bpro->selling_price}}</span> </div>

                    @endif
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
              
                 
                </div>
               
              </div>
              @endforeach 
            
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== BEST SELLER : END ============================================== --> 
        
        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                    <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post2.jpg')}}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item --> 
              
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post2.jpg')}}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item --> 
              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">New Arrivals</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

          @php
          $npro = App\Models\productmodel::where('status', '1')->orderBy('id', 'DESC')->limit(4)->get();
          @endphp



        @foreach($npro as $pro)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{url('pro/detail/'.$pro->id.'/'.$pro->slug_eng)}}"><img  src="{{asset($pro->pro_thumbnail)}}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag new">
                      @if($pro->discount_price == 0 or $pro->discount_price < 0 or $pro->discount_price == null)

                      <span>new</span>
                      @else
                      <span>{{$pro->discount_price}}%</span>

                      @endif
                     
                    </div>
                  </div>
                  <!-- /.product-image -->

                  @php

                  $sel = $pro->selling_price - $pro->discount_price;
                  $amo = ($sel/$pro->selling_price) * 100;

                  @endphp
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{url('pro/detail/'.$pro->id.'/'.$pro->slug_eng)}}">
                      @if(session()->get('language') == 'urdu') {{$pro->proname_urdu}}         @else   {{$pro->proname_eng}}       @endif
                    </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($pro->discount_price == 0 or $pro->discount_price < 0 or $pro->discount_price == null)

                    <div class="product-price"> <span class="price">{{$pro->selling_price}}</span></div>
                      @else
                      
                      <div class="product-price"> <span class="price"> </span></div>
                      <div class="product-price"> <span class="price"> {{$amo}} </span> <span class="price-before-discount">{{$pro->selling_price}}</span> </div>
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
                        <li class="lnk wishlist"> <button class="add-to-cart"   title="Wishlist"> <i class="icon fa fa-heart"></i> </button> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
        </div>
            <!-- /.item -->
            
            <!-- /.item -->
            
            
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>

     




@endsection