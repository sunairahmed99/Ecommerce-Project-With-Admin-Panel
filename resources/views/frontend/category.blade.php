<div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
          @php

            $cat = App\Models\categorymodel::orderBy('catnam_eng', 'ASC')->get();
            @endphp


            @foreach($cat as $category)
            <ul class="nav">
             

              <li class="dropdown menu-item"> <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
              @if (session()->get('language') == 'urdu') {{$category->catname_urdu}}        @else {{$category->catnam_eng}}        @endif
              </a>
            
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-3">
                      @php

                  $subcat = App\Models\subcatmodel::where('cat_id', $category->id)->orderBy('subcatname_eng', 'ASC')->get();

                  @endphp

                  @foreach($subcat as $sub)
                        <ul class="links list-unstyled">
                          <li><a href="{{url('subcategories/'.$sub->id)}}">
                            @if(session()->get('language') == 'urdu') {{$sub->subcatname_urdu}}    @else {{$sub->subcatname_eng}}      @endif
                            
                          </a></li>
                         
                        </ul>
                  @endforeach      
                      </div>
                      <!-- /.col -->
                     
                      <!-- /.col -->
                     
                      <!-- /.col -->
                      
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  
                  <!-- /.yamm-content -->
                </ul>
                @endforeach
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
         
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 