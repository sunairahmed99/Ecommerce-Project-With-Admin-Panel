<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\adminprofilecontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\brandcontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\subcatcontroller;
use App\Http\Controllers\Subsubcontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\slidercontroller;
use App\Http\Controllers\langcontroller;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\whishlistcontroller;
use App\Http\Controllers\cartpagecontroller;
use App\Http\Controllers\couponcontroller;
use App\Http\Controllers\shippingcontroller;
use App\Http\Controllers\areacontroller;
use App\Http\Controllers\statecontroller;
use App\Http\Controllers\checkoutcontroller;
use App\Http\Controllers\ordercontroller;
use App\Http\Controllers\backordercontroller;
use App\Http\Controllers\reportcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/Home', function () {
        return view('frontend.Home');   
    })->name('dashboard');
});

Route::get('/login',[Homecontroller::class,'userlogin'])->name('login'); 

Route::get('/',[Homecontroller::class, 'viewHome'])->name('Home.pagee');
Route::get('/user/logout',[Homecontroller::class, 'userlogout'])->name('user.logout');


Route::get('/profile', [Homecontroller::class, 'userprofile'])->name('user.profile');
Route::get('/profile/edit', [Homecontroller::class, 'editprofile'])->name('edit.profile');
Route::post('/profile/update', [Homecontroller::class, 'updateprofile'])->name('profile.update');
Route::get('/profile/edit/pass', [Homecontroller::class, 'editpass'])->name('edit.pass');
Route::post('/profile/update/pass', [Homecontroller::class, 'updatepass'])->name('pass.update');
Route::get('/user/order', [ordercontroller::class, 'vieworder'])->name('user.order');
Route::get('/view/order/{id}', [ordercontroller::class, 'orderview'])->name('view.orders');
Route::post('/view/order/{id}', [ordercontroller::class, 'reasonpost'])->name('reason.post');

Route::get('/lang/eng', [langcontroller::class, 'englang'])->name('eng.lang');
Route::get('/lang/urdu', [langcontroller::class, 'urdulang'])->name('urdu.lang');

Route::get('/pro/detail/{id}/{slug}',[Homecontroller::class, 'detail']);

Route::get('product/tag/{tag}', [Homecontroller::class, 'protags']);

Route::get('subcategories/{id}',[Homecontroller::class,'subcatshow']);

Route::get('Subsubcategories/{id}/{slug}', [Homecontroller::class, 'Subsubcat']);

Route::get('categories/{id}/{slug}', [Homecontroller::class, 'categoriesshow']);

Route::get('/product/view/model/{id}', [Homecontroller::class, 'viewmodel']);

Route::post('/cart/data/store/{id}', [cartcontroller::class,'addtocart']);

Route::get('/product/mini/cart', [cartcontroller::class,'addminicart']);

Route::get('/minicart/pro/del/{rowId}', [cartcontroller::class,'delminicart']);



Route::middleware(['user', 'auth'])->group(function(){
 Route::post('/add/whishlist/{id}', [whishlistcontroller::class,'addwhish']);

Route::get('whishlist/view', [whishlistcontroller::class,'viewwhish'])->name('whish.list');

Route::get('whish/view', [whishlistcontroller::class,'wishview']);

Route::get('/delete/wish/cart/{id}',[whishlistcontroller::class,'delwish']);

});

Route::get('/cart/view/page', [cartpagecontroller::class,'viewcartpage'])->name('cart.page');
Route::get('/cart/page/view', [cartpagecontroller::class,'addcart']);
Route::get('/delete/cartdetail/cart/{id}', [cartpagecontroller::class,'delcart']);

Route::get('/inc/added/{id}', [cartpagecontroller::class,'addedcart']);
Route::get('/dec/added/{id}', [cartpagecontroller::class,'deccart']);

Route::get('/checkout/orders',[checkoutcontroller::class,'viewcheckout'])->name('checkout.page');

Route::get('division/view/{id}',[checkoutcontroller::class,'viewdiv']);
Route::get('state/view/{id}',[checkoutcontroller::class,'viewstate']);
Route::post('checkout/form',[checkoutcontroller::class,'checkoutpost'])->name('checkout.post');
Route::get('checkout/form/stripe',[checkoutcontroller::class,'viewstripe'])->name('stripe.payment');
Route::post('checkout/post',[checkoutcontroller::class,'stripepost'])->name('stripe.post');

Route::post('cash/post',[checkoutcontroller::class,'cashpost'])->name('cash.post');

Route::get('pdf/view/{id}',[ordercontroller::class,'viewpdf'])->name('view.pdf');



//Route::get('/login', [Homecontroller::class, 'homelogin'])->name('home.login');






//Admin Starts Here

Route::middleware(['admin:admin'])->group(function(){

    Route::get('admin/login', [Admincontroller::class, 'loginForm']);
    Route::post('admin/login', [Admincontroller::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){



    Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('backend.index');
        })->name('dashboard');
    });
    
    Route::get('admin/profile/', [adminprofilecontroller::class, 'profile'])->name('admin.profile');
    Route::get('admin/profile/{id}', [adminprofilecontroller::class, 'profileedit'])->name('admin.profile.edit');
    Route::post('admin/update/{id}', [adminprofilecontroller::class, 'profileupdate'])->name('admin.profile.update');
    Route::get('admin/password', [adminprofilecontroller::class, 'profilepass'])->name('admin.password');
    Route::post('admin/password', [adminprofilecontroller::class, 'profilepassupdate'])->name('profile.pass');
    Route::get('admin/logout', [Admincontroller::class, 'destroy'])->name('admin.logout');
    
    Route::prefix('brands')->group(function(){
    
    Route::get('/view/brands', [brandcontroller::class, 'viewbrand'])->name('view.brands');
    Route::post('/view/brands', [brandcontroller::class, 'addbrand'])->name('add.brands');
    Route::get('/edit/brands{id}', [brandcontroller::class, 'editbrand'])->name('brand.edit');
    Route::post('/update/brands{id}', [brandcontroller::class, 'updatebrand'])->name('brand.update');
    Route::get('/delete/brands{id}', [brandcontroller::class, 'delbrand'])->name('brand.del');
    });
    
    Route::prefix('categories')->group(function(){
    
    Route::get('/view/cat/categories', [categorycontroller::class, 'viewcat'])->name('view.cat');
    Route::post('/view/add', [categorycontroller::class, 'addcategory'])->name('add.category');
    Route::get('/edit/cat/{id}', [categorycontroller::class, 'editcat'])->name('cat.edit');
    Route::post('/update/cat/{id}', [categorycontroller::class, 'updatecat'])->name('cat.update');
    Route::get('/delete/cat/{id}', [categorycontroller::class, 'delcat'])->name('cat.del');
    });
    
    Route::prefix('subcategories')->group(function(){
    
    Route::get('/view/subcat', [subcatcontroller::class, 'viewsubcat'])->name('view.subcat');
    Route::post('/view/sub', [subcatcontroller::class, 'addsubcategory'])->name('add.subcategory');
    Route::get('/edit/sub{id}', [subcatcontroller::class, 'editsubcat'])->name('subcat.edit');
    Route::post('/update/sub{id}', [subcatcontroller::class, 'updatesubcat'])->name('subcat.update');
    Route::get('/delete/sub{id}', [subcatcontroller::class, 'delcat'])->name('subcat.del');
    });
    
    Route::prefix('/Products')->group(function(){
    
    Route::get('/view/pro', [productcontroller::class, 'viewproduct'])->name('view.products');
    Route::get('/add/pro', [productcontroller::class, 'addproduct'])->name('add.product');
    Route::post('/update/pro', [productcontroller::class, 'productadd'])->name('pro.add.post');
    Route::get('/edit/pro/{id}', [productcontroller::class, 'editproduct'])->name('pro.edit');
    Route::post('/update/pro/{id}', [productcontroller::class, 'updateproduct'])->name('pro.update.post');
    Route::get('/del/pro/{id}', [productcontroller::class, 'delproduct'])->name('pro.del');
    Route::post('/image', [productcontroller::class, 'updateproductimage'])->name('pro.image');
    Route::get('/image/del/pro/{id}', [productcontroller::class, 'deletemimage'])->name('pro.mimage.del');
    Route::get('/deactive/pro/{id}', [productcontroller::class, 'deactive'])->name('pro.deactive');
    Route::get('/active/pro/{id}', [productcontroller::class, 'active'])->name('pro.active');
    
    });
    
    Route::prefix('Subsubcategories')->group(function(){
    
    Route::get('/view', [Subsubcontroller::class, 'viewSubsubcat'])->name('view.sub.subcat');
    Route::post('/view', [Subsubcontroller::class, 'addSubsubcategory'])->name('add.sub.subcategory');
    Route::get('/edit/{id}', [Subsubcontroller::class, 'editsubcat'])->name('sub.subcat.edit');
    Route::post('/update/{id}', [Subsubcontroller::class, 'updatesubcat'])->name('sub.subcat.update');
    Route::get('/update/{id}', [Subsubcontroller::class, 'delcat'])->name('sub.subcat.del');
    });
    
    Route::prefix('Slider')->group(function(){
    
    //Route::get('/view', [Subsubcontroller::class, 'viewSubsubcat'])->name('view.sub.subcat');
    Route::get('/add/slider', [slidercontroller::class, 'addSlider'])->name('add.slider');
    Route::post('/update/slider', [slidercontroller::class, 'slideradd'])->name('slider.add');
    Route::get('/editslider//sli/{id}', [slidercontroller::class, 'editslider'])->name('slider.edit');
    Route::post('/updateslider/sli/{id}', [slidercontroller::class, 'updateslider'])->name('slider.update');
    Route::get('/deactivate/sli/{id}', [slidercontroller::class, 'sliderdeactive'])->name('slider.deactive');
    Route::get('/activate/sli/{id}', [slidercontroller::class, 'slideractive'])->name('slider.active');
    Route::get('/del/sli/{id}', [slidercontroller::class, 'sliderdel'])->name('slider.del');
    
    });

    Route::get('coupon/view',[couponcontroller::class,'viewcoupon'])->name('coupon.view');
    Route::post('coupon/view',[couponcontroller::class,'addcoupon'])->name('coupon.add');
    Route::get('coupon/edit/{id}',[couponcontroller::class,'editcoupon'])->name('coupon.edit');
    Route::post('coupon/update/{id}',[couponcontroller::class,'updatecoupon'])->name('coupon.update');
    Route::get('coupon/del/{id}',[couponcontroller::class,'delcoupon'])->name('coupon.del');


    Route::get('Division/view',[shippingcontroller::class,'viewdivision'])->name('division.view');
    Route::post('Division/add',[shippingcontroller::class,'adddivision'])->name('division.add');
    Route::get('Division/edit/{id}',[shippingcontroller::class,'editdivision'])->name('shipping.edit');
    Route::post('Division/update/{id}',[shippingcontroller::class,'updatedivision'])->name('division.update');
    Route::get('Division/del/{id}',[shippingcontroller::class,'deldivision'])->name('shipping.del');


    Route::get('area/view',[areacontroller::class,'viewarea'])->name('area.view');
    Route::post('area/add',[areacontroller::class,'addarea'])->name('add.area');
    Route::get('area/edit/{id}',[areacontroller::class,'editarea'])->name('area.edit');
    Route::post('area/update/{id}',[areacontroller::class,'updatearea'])->name('update.area');
    Route::get('area/del/{id}',[areacontroller::class,'delarea'])->name('area.del');

    Route::get('state/add/view',[statecontroller::class,'stateview'])->name('state.view');
    Route::post('state/add/view',[statecontroller::class,'stateadd'])->name('add.state');
    Route::get('state/edit/view/{id}',[statecontroller::class,'stateedit'])->name('state.edit');
    Route::post('state/update/{id}',[statecontroller::class,'stateupdate'])->name('update.state');
    Route::get('state/del/{id}',[statecontroller::class,'statedel'])->name('state.del');

    Route::get('order/handling',[backordercontroller::class,'pendingorder'])->name('pending.order');
    Route::get('order/handling/view/{id}',[backordercontroller::class,'pendingvieworder'])->name('view.order');

    Route::get('order/confirm',[backordercontroller::class,'confirmorder'])->name('confirmed.order');
    Route::get('order/processing',[backordercontroller::class,'processorder'])->name('process.order');
    Route::get('order/picked',[backordercontroller::class,'pickedorder'])->name('picked.order');
    Route::get('order/shiped',[backordercontroller::class,'shipedorder'])->name('shiped.order');
    Route::get('order/delivered',[backordercontroller::class,'deliveredorder'])->name('delivered.order');
    Route::get('order/cancel',[backordercontroller::class,'cancelorder'])->name('cancel.order');

    Route::get('order/con/{id}',[backordercontroller::class,'corder'])->name('c.order');
    Route::get('order/pro/{id}',[backordercontroller::class,'porder'])->name('p.order');
    Route::get('order/pick/{id}',[backordercontroller::class,'piorder'])->name('pi.order');
    Route::get('order/shi/{id}',[backordercontroller::class,'shorder'])->name('sh.order');
    Route::get('order/deli/{id}',[backordercontroller::class,'dorder'])->name('d.order');
    Route::get('order/canc/{id}',[backordercontroller::class,'caorder'])->name('ca.order');

    Route::get('view/reports',[reportcontroller::class,'viewreport'])->name('all.reports');

    Route::post('date/reports',[reportcontroller::class,'datereport'])->name('date.reports');
    Route::post('month/reports',[reportcontroller::class,'monthreport'])->name('month.reports');
    Route::post('year/reports',[reportcontroller::class,'yearreport'])->name('year.reports');

    Route::get('view/users/',[reportcontroller::class,'viewuser'])->name('all.users');
  

    

});





//Admin Ends Here