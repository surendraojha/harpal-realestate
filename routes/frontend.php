<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Front\AjaxController;
use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\BoostController;
use App\Http\Controllers\Front\CommercialPropertyController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\ForumController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\Front\HomeStayController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\PropertyController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\ResidentalPropertyController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\TestimonialController;
use App\Http\Controllers\Front\WishListController;



Route::get('/',[FrontendController::class,'index'])->name('front.home');


Route::get('/blog',[FrontendController::class,'blog'])->name('front.blog');

Route::get('/blog-detail/{slug}',[FrontendController::class,'blogDetail'])->name('front.blog-detail');


Route::get('/rental-property',[FrontendController::class,'rentalHome'])->name('rental.home');



Route::get('all-properties',[SearchController::class,'filterProperty'])->name('filter.property');



Route::get('/shift-home',[FrontendController::class,'shifthome'])->name('front.shifthome');
Route::post('/shift-home',[FrontendController::class,'shifthomePost'])->name('front.shifthome');


// Route::
Route::get('register',[RegisterController::class,'register'])->name('front.register');

Route::post('register',[RegisterController::class,'registerPost'])->name('front.register');

Route::get('user/verify/{token}',[RegisterController::class,'verifyAccount'])->name('user.verify');

Route::get('verification',[RegisterController::class,'verification'])->name('register.verification');



Route::get('user-login',[LoginController::class,'login'])->name('login');

Route::post('user-login',[LoginController::class,'loginPost'])->name('front.login');



//
Route::group(['middleware'=>['auth']],function(){

    Route::get('user-dashboard',[DashboardController::class,'dashboard'])->name('front.dashboard');

    Route::get('profile',[ProfileController::class,'profile'])->name('profile');

    Route::get('my-comments',[ProfileController::class,'myComments'])->name('my.comments');


    Route::post('profile',[ProfileController::class,'updateProfile'])->name('profile.update');
    // profiles
    Route::resource('my-property',PropertyController::class)->middleware('is-profile-complete');
    Route::get('property-full-filled/{id}',[PropertyController::class,'fulfilled'])->name('my-property.fulfilled');


    Route::resource('residental-property',ResidentalPropertyController::class);

    Route::resource('commercial-property',CommercialPropertyController::class);


    Route::get('my-wishlist',[WishListController::class,'index'])->name('my-wishlist.index');

    Route::get('add-to-wishlist/{property_id}',[WishListController::class,'addToWishList'])->name('add-to-wish-list');

    Route::get('remove-wishlist/{property_id}',[WishListController::class,'removeFromWishList'])->name('remove-from-wish-list');


    Route::post('submit-forum',[ForumController::class,'submitForum'])->name('submit.forum');


    Route::get('like-support-forum/{id}',[ForumController::class,'likeForum'])->name('like.forum');

    Route::get('change-password',[DashboardController::class,'changepassword'])->name('front.change');

    Route::post('change-password',[DashboardController::class,'changePasswordPost'])->name('front.change');

    Route::resource('front-testimonial',TestimonialController::class);


});

// support forum
Route::get('support-forum',[ForumController::class,'index'])->name('support.forum');

Route::get('single-forum/{id}',[ProfileController::class,'singleForum'])->name('single.forum');



Route::get('get-sub-category',[AjaxController::class,'getSubcategory'])->name('get.sub-category');


Route::post('contact-us-post',[FrontendController::class,'contactUsPost'])->name('front.contact-us.post');

Route::get('find-me-room',[FrontendController::class,'findMeRoom'])->name('findme.room');
Route::get('contact-us',[FrontendController::class,'message'])->name('front.contact-us');
Route::post('contact-us',[FrontendController::class,'messagePost'])->name('front.contact-us');


Route::post('newsletter-post',[FrontendController::class,'newsletterPost'])->name('newsletter.post');

Route::get('login/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);

Route::get('login/google', [SocialLoginController::class, 'redirectToGoogle'])->name('login.google');

// Facebook login
Route::get('login/facebook/callback', [SocialLoginController::class, 'handleFacebookCallback']);
Route::get('login/facebook', [SocialLoginController::class, 'redirectToFacebook'])->name('login.facebook');

Route::get('top-rated',[FrontendController::class,'topRated'])->name('front.top-rated');

// home stay


// about us

Route::get('about-us',[FrontendController::class,'aboutUs'])->name('front.about-us');

Route::get('frequently-asked-questions',[FrontendController::class,'faq'])->name('front.faq');


Route::get('page/{slug}',[FrontendController::class,'page'])->name('front.page');



Route::get('boost/{slug}',[BoostController::class,'boost'])->name('front.boost');
Route::post('boost-post',[BoostController::class,'boostPost'])->name('front.boost.post');


Route::get('delete-photo/{id}/{div_id}',[AjaxController::class,'deletePhoto'])->name('delete.photo');


Route::get('/partner',[FrontendController::class,'partner'])->name('front.partner');

Route::get('/boost-detail',[FrontendController::class,'boost'])->name('front.boost-detail');



// filter by location
Route::get('location/{location}',[FrontendController::class,'propertyByLocation'])->name('front.location');


// featured
Route::get('featured-properties',[FrontendController::class,'featured'])
->name('front.featured');


// recommended
Route::get('recommended-properties',[FrontendController::class,'recommended'])
->name('front.recommended');

// new deals
Route::get('latest-properties',[FrontendController::class,'newDeals'])
->name('front.newdeals');


// category
Route::get('category/{slug}',[FrontendController::class,'category'])->name('front.category');




Route::get('view-profile/{email}',[FrontendController::class,'viewProfile'])->name('view.profile');

Route::get('/{slug}',[FrontendController::class,'showPropertyDetail'])->name('property.detail');





// Google login

// Linkedin login
// Route::get('login/linkedin', [SocialLoginController::class, 'redirectToLinkedin'])->name('login.linkedin');
// Route::get('login/linkedin/callback', [SocialLoginController::class, 'handleLinkedinCallback']);
