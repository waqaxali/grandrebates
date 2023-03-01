<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminpanel\AdminController;
use App\Http\Controllers\adminpanel\storecontroller;
use App\Http\Controllers\adminpanel\categorycontroller;
use App\Http\Controllers\adminpanel\postcontroller;
use App\Http\Controllers\adminpanel\PaypalController;
use App\Http\Controllers\adminpanel\featuredcontroller;
use App\Http\Controllers\adminpanel\offercontroller;
use App\Http\Controllers\adminpanel\countrycontroller;
use App\Http\Controllers\adminpanel\usercontroller;
use App\Http\Controllers\adminpanel\networkcontroller;
use App\Http\Controllers\adminpanel\slidercontroller;
use App\Http\Controllers\adminpanel\subcategorycontroller;
use App\Http\Controllers\customcontroller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SocialShareButtonsController;
use Illuminate\Support\Facades\Artisan;

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


// Route::get('/', function()
// {
//     return redirect()->route('welcome');
// });



Route::get('/clear', function () {
   Artisan::call('cache:clear');
   Artisan::call('route:clear');
   Artisan::call('config:cache');
   Artisan::call('optimize:clear');

   return "Cache cleared successfully";
});

Auth::routes();

Route::get('/',  [App\Http\Controllers\customcontroller::class, 'welcome'])->name('welcome');

Route::get('anywhere', [App\Http\Controllers\customcontroller::class, 'anywhere'])->name('anywhere');
Route::get('influencers', [App\Http\Controllers\customcontroller::class, 'influencers'])->name('influencers');
Route::get('about', [App\Http\Controllers\customcontroller::class, 'about'])->name('about');
Route::get('terms', [App\Http\Controllers\customcontroller::class, 'terms'])->name('terms');
Route::get('partners', [App\Http\Controllers\customcontroller::class, 'partners'])->name('partners');

Route::get('/home', [App\Http\Controllers\customcontroller::class, 'index'])->name('home');
Route::get('/user/home', [App\Http\Controllers\customcontroller::class, 'index'])->name('user/home');

// Route::get('admin/login/', [AdminController::class,'login'])->name('admin.login');
Route::post('auth/', [App\Http\Controllers\Auth\LoginController::class,'auth'])->name('auth');
 Route::post('register_user', [AdminController::class,'register_user'])->name('register_user');
Route::get('subscription', [AdminController::class, 'subscription'])->name('subscription');


Route::get('all_post/{id?}', [postcontroller::class,'all_post'])->name('all_post');
Route::get('single_post/{id}', [postcontroller::class,'single_post'])->name('single_post');

Route::get('paywithpaypal', [PaypalController::class,'payWithPaypal']);
Route::post('paypal1', [PaypalController::class,'postPaymentWithpaypal'])->name('paypal1');
Route::get('paypal', [PaypalController::class,'getPaymentStatus']);
Route::get('status', [PaypalController::class,'status'])->name('status');


// working on user side
Route::get('stores', [storecontroller::class,'stores'])->name('stores');
Route::get('categories/{id?}', [categorycontroller::class,'categories'])->name('categories');
//{type?} if an error occour
Route::get('codes/{id?}', [usercontroller::class,'codes'])->name('codes');
Route::get('view_codes/{id}/{type?}', [usercontroller::class,'view_codes'])->name('view_codes');
Route::get('reffereduser/{username}', [usercontroller::class,'reffereduser'])->name('reffereduser');

Route::post('autocomplete_search', [storecontroller::class,'autocomplete_search'])->name('autocomplete_search');

Route::middleware(['auth'])->group(function () {
        Route::get('all_store', [storecontroller::class,'all_store'])->name('all_store');
        Route::get('add_store', [storecontroller::class,'add_store'])->name('add_store');
        Route::post('save_store', [storecontroller::class,'save_store'])->name('save_store');
        Route::get('edit_store/{slug}/{store_name?}', [storecontroller::class,'edit_store'])->name('edit_store');
        Route::post('update_store/{slug}', [storecontroller::class,'update_store'])->name('update_store');
        Route::post('delete_store/{slug}', [storecontroller::class,'delete_store'])->name('delete_store');
        Route::any('search_store', [storecontroller::class,'search_store'])->name('search_store');
        Route::post('get_category_ajaxcall', [storecontroller::class,'get_category_ajaxcall'])->name('get_category_ajaxcall');



        Route::post('save_store_notes', [storecontroller::class,'save_store_notes'])->name('save_store_notes');

        Route::get('countries', [countrycontroller::class,'countries'])->name('countries');
        Route::get('add_country', [countrycontroller::class,'add_country'])->name('add_country');
        Route::post('save_country', [countrycontroller::class,'save_country'])->name('save_country');
        Route::get('edit_country/{slug}', [countrycontroller::class,'edit_country'])->name('edit_country');
        Route::post('update_country/{slug}', [countrycontroller::class,'update_country'])->name('update_country');
        Route::post('delete_country/{slug}', [countrycontroller::class,'delete_country'])->name('delete_country');


        Route::get('networks', [networkcontroller::class,'networks'])->name('networks');
        Route::get('add_network', [networkcontroller::class,'add_network'])->name('add_network');
        Route::post('save_network', [networkcontroller::class,'save_network'])->name('save_network');
        Route::get('edit_network/{slug}', [networkcontroller::class,'edit_network'])->name('edit_network');
        Route::post('update_network/{slug}', [networkcontroller::class,'update_network'])->name('update_network');
        Route::post('delete_network/{slug}', [networkcontroller::class,'delete_network'])->name('delete_network');


        Route::get('all_category', [categorycontroller::class,'all_category'])->name('all_category');
        Route::get('add_category', [categorycontroller::class,'add_category'])->name('add_category');
        Route::post('save_category', [categorycontroller::class,'save_category'])->name('save_category');
        Route::get('edit_category/{id?}', [categorycontroller::class,'edit_category'])->name('edit_category');
        Route::post('update_category/{id}', [categorycontroller::class,'update_category'])->name('update_category');
        Route::post('delete_category/{id?}', [categorycontroller::class,'delete_category'])->name('delete_category');
        Route::post('track_store_category_ajaxcall', [categorycontroller::class,'track_store_category_ajaxcall'])->name('track_store_category_ajaxcall');

        Route::get('posts', [postcontroller::class,'posts'])->name('posts');
        Route::get('add_post', [postcontroller::class,'add_post'])->name('add_post');
        Route::post('save_post', [postcontroller::class,'save_post'])->name('save_post');
        Route::get('edit_post/{id}', [postcontroller::class,'edit_post'])->name('edit_post');
        Route::post('update_post/{id}', [postcontroller::class,'update_post'])->name('update_post');
        Route::post('delete_post/{id}', [postcontroller::class,'delete_post'])->name('delete_post');

        Route::get('all_featured', [featuredcontroller::class,'all_featured'])->name('all_featured');
        Route::get('add_featured', [featuredcontroller::class,'add_featured'])->name('add_featured');
        Route::post('ajaxcall', [featuredcontroller::class,'ajaxcall'])->name('ajaxcall');
        Route::post('save_featured', [featuredcontroller::class,'save_featured'])->name('save_featured');
        Route::get('edit_featured/{id?}', [featuredcontroller::class,'edit_featured'])->name('edit_featured');
        Route::post('update_featured/{id}', [featuredcontroller::class,'update_featured'])->name('update_featured');
        Route::post('delete_featured/{id?}', [featuredcontroller::class,'delete_featured'])->name('delete_featured');

        Route::get('sliders', [slidercontroller::class,'sliders'])->name('sliders');
        Route::get('add_slider', [slidercontroller::class,'add_slider'])->name('add_slider');
        Route::post('save_slider', [slidercontroller::class,'save_slider'])->name('save_slider');
        Route::get('edit_slider/{id?}', [slidercontroller::class,'edit_slider'])->name('edit_slider');
        Route::post('update_slider/{id}', [slidercontroller::class,'update_slider'])->name('update_slider');
        Route::post('delete_slider/{id}', [slidercontroller::class,'delete_slider'])->name('delete_slider');


        Route::get('subcategories', [subcategorycontroller::class,'subcategories'])->name('subcategories');
        Route::get('add_subcategory', [subcategorycontroller::class,'add_subcategory'])->name('add_subcategory');
        Route::post('save_subcategory', [subcategorycontroller::class,'save_subcategory'])->name('save_subcategory');
        Route::get('edit_subcategory/{id?}', [subcategorycontroller::class,'edit_subcategory'])->name('edit_subcategory');
        Route::post('update_subcategory/{id}', [subcategorycontroller::class,'update_subcategory'])->name('update_subcategory');
        Route::post('delete_subcategory/{id}', [subcategorycontroller::class,'delete_subcategory'])->name('delete_subcategory');


        Route::get('all_offers/{slug?}', [offercontroller::class,'all_offers'])->name('all_offers');
        Route::get('add_offer/{store_slug?}', [offercontroller::class,'add_offer'])->name('add_offer');
         Route::post('save_offer', [offercontroller::class,'save_offer'])->name('save_offer');
        Route::get('edit_offer/{slug}/{store_slug?}', [offercontroller::class,'edit_offer'])->name('edit_offer');


        Route::post('update_offer/{slug}', [offercontroller::class,'update_offer'])->name('update_offer');
        Route::post('delete_offer/{slug}', [offercontroller::class,'delete_offer'])->name('delete_offer');
        Route::post('search_offers', [offercontroller::class,'search_offers'])->name('search_offers');
        Route::get('store_offers/{slug}/{relevent_offers?}', [offercontroller::class,'store_offers'])->name('store_offers');







        Route::get('users', [usercontroller::class,'users'])->name('users');
        Route::get('add_user', [usercontroller::class,'add_user'])->name('add_user');
        Route::post('save_user', [usercontroller::class,'save_user'])->name('save_user');
        Route::get('edit_user/{id?}', [usercontroller::class,'edit_user'])->name('edit_user');
        Route::post('update_user/{id}', [usercontroller::class,'update_admin'])->name('update_admin');
        Route::post('delete_user/{id}', [usercontroller::class,'delete_user'])->name('delete_user');
        /////////////////////user side working here /////////////////







        Route::get('earnings', [usercontroller::class,'earnings'])->name('earnings');
        Route::get('saves', [usercontroller::class,'saves'])->name('saves');
        Route::get('settings', [usercontroller::class,'settings'])->name('settings');
        Route::get('referrals', [usercontroller::class,'referrals'])->name('referrals');
        Route::get('change_password', [usercontroller::class,'change_password'])->name('change_password');
        Route::post('update_password', [usercontroller::class,'update_password'])->name('update_password');
        Route::post('update_user', [usercontroller::class,'update_user'])->name('update_user');
        Route::post('track_store_ajaxcall', [usercontroller::class,'track_store_ajaxcall'])->name('track_store_ajaxcall');

        Route::post('track_featured_store_ajaxcall', [usercontroller::class,'track_featured_store_ajaxcall'])->name('track_featured_store_ajaxcall');




        Route::get('social_media_share', [SocialShareButtonsController::class,'ShareWidget'])->name('social_media_share');

    }
);

//google
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

//facebook
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

//github
Route::get('login/github', [LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [LoginController::class, 'handleGithubCallback']);
