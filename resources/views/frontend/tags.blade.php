@php  

$tags_eng = App\Models\productmodel::groupBy('protags_eng')->select('protags_eng')->get();
 $tags_urdu =App\Models\productmodel::groupBy('protags_urdu')->select('protags_urdu')->get();




@endphp




<div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list">
              @if(session()->get('language') == 'urdu')

              @foreach($tags_urdu as $tu)

              <a class="item" title="Phone" href="{{url('product/tag/'.$tu->protags_urdu)}}">{{str_replace(',',' ',$tu->protags_urdu )}}</a>

              @endforeach

              @else

              @foreach($tags_eng as $tu)

              <a class="item" title="Phone" href="{{url('product/tag/'.$tu->protags_eng)}}">{{str_replace(',',' ',$tu->protags_eng)}}</a>

              @endforeach

              @endif
     
               </div>
      
            <!-- /.tag-list --> 
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 