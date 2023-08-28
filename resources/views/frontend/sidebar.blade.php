<div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
      @include('frontend.category')
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        
        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
            @foreach($hotpro as $hot)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                 
                  <div class="image"> <img src=" {{asset($hot->pro_thumbnail)}}" alt=""> </div>
                  <div class="sale-offer-tag">
                    @if($hot->discount_price < 0 or $hot->discount_price == 0 or $hot->discount_price == Null )

                    <span>New<br>

                    @else

                    <span>{{$hot->discount_price}}%<br>
                    off</span>

                    @endif
                    </div>
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->

                @php

                $price = $hot->selling_price - $hot->discount_price;
                $selprice = ($price/$hot->selling_price) * 100;



                @endphp
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="{{url('pro/detail/'.$hot->id.'/'.$hot->slug_eng)}}">
                    @if(session()->get('language') == 'urdu') {{$hot->proname_urdu}}  @else  {{$hot->proname_eng}}     @endif
                    </a></h3>
                  <div class="rating rateit-small"></div>
                  @if($hot->discount_price < 0 or $hot->discount_price == 0 or $hot->discount_price == Null )

                  
                  <div class="product-price"><span class="price-before-discount">{{$hot->selling_price}}</span> </div>

                  @else

                  <div class="product-price"> <span class="price">{{$selprice}}</span> <span class="price-before-discount" style='color:red'>{{$hot->selling_price}}</span> </div>

                  @endif
                 
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
            @endforeach
           
          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              

              <div class="item">
                <div class="products special-product">
                @foreach($specialpro as $spro)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{url('pro/detail/'.$spro->id.'/'.$spro->slug_eng)}}"> <img src=" {{asset($spro->pro_thumbnail)}}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->

                         @php

                        $price = $spro->selling_price - $spro->discount_price;
                        $selprice = ($price/$spro->selling_price) * 100;



                        @endphp
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{url('pro/detail/'.$spro->id.'/'.$spro->slug_eng)}}">
                              @if(session()->get('language') == 'urdu') {{$spro->proname_urdu}}     @else {{$spro->proname_eng}}     @endif
                              Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>

                            @if($spro->discount_price < 0 or $spro->discount_price == 0 or $spro->discount_price == Null )

                  
                        <div class="product-price"><span class="price-before-discount">{{$spro->selling_price}}</span> </div>

                        @else

                        <div class="product-price"> <span class="price">{{$selprice}}</span> <span class="price-before-discount" style="color:red">{{$spro->selling_price}}</span> </div>

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
                  @endforeach  
                 
                </div>
              </div>
             
             
             
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
        <!-- ============================================== PRODUCT TAGS ============================================== -->
       
@include('frontend.tags')
        <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
        <!-- ============================================== SPECIAL DEALS ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products special-product">
                  @foreach($dealspro as $pro)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                          
                            <div class="image"> <a href="{{url('pro/detail/'.$spro->id.'/'.$spro->slug_eng)}}"> <img src="{{asset($pro->pro_thumbnail)}}"  alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->

                        @php

                        $price = $pro->selling_price - $pro->discount_price;
                        $selprice = ($price/$pro->selling_price) * 100;



                        @endphp
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{url('pro/detail/'.$spro->id.'/'.$spro->slug_eng)}}">
                            @if(session()->get('language') == 'urdu') {{$pro->proname_urdu}}     @else {{$pro->proname_eng}}     @endif
                            </a></h3>
                            <div class="rating rateit-small"></div>
                            @if($pro->discount_price < 0 or $pro->discount_price == 0 or $pro->discount_price == Null )

                  
                            <div class="product-price"><span class="price-before-discount">{{$pro->selling_price}}</span> </div>

                            @else

                            <div class="product-price"> <span class="price">{{$selprice}}</span> <span class="price-before-discount" style="color:red">{{$pro->selling_price}}</span> </div>

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
                  @endforeach
               
                </div>
              </div>
              <div class="item">
                <div class="products special-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                         
                            <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p18.jpg')}}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                          
                            <div class="image"> <a href="#"> <img src=" {{asset('frontend/assets/images/products/p17.jpg')}}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                          
                            <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p16.jpg')}}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
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
              <div class="item">
                <div class="products special-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                          
                            <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p15.jpg')}}" alt="images">
                              <div class="zoom-overlay"></div>
                              </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                         
                            <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p14.jpg')}}"  alt="">
                              <div class="zoom-overlay"></div>
                              </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                          
                            <div class="image"> <a href="#"> <img src=" {{asset('frontend/assets/images/products/p13.jpg')}}" alt="image"> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
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
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
              </div>
              <button class="btn btn-primary">Subscribe</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="{{asset('frontend/assets/images/testimonials/member1.png')}}" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            
            <div class="item">
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
        
        <div class="home-banner"> <img src=" {{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
      </div>