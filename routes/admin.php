<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BoostController;
use App\Http\Controllers\Admin\BoostDetailController;
use App\Http\Controllers\Admin\BoostFeatureController;
use App\Http\Controllers\Admin\BoostingStepController;
use App\Http\Controllers\Admin\BoostSubscriptionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\FamilyWelcomeController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeaturedPropertyController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\HomeFacilityController;
use App\Http\Controllers\Admin\HomepageProductController;
use App\Http\Controllers\Admin\HomeStayController;
use App\Http\Controllers\Admin\HomeStayVideoController;
use App\Http\Controllers\Admin\HomeTypeController;
use App\Http\Controllers\Admin\LocalAreaFacilityController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\OurServiceController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PurposeController;
use App\Http\Controllers\Admin\QuickLinkController;
use App\Http\Controllers\Admin\RecommendedPropertyController;
use App\Http\Controllers\Admin\ResidentalPropertyController;
use App\Http\Controllers\Admin\RoadSizeController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ShiftHomeContentController;
use App\Http\Controllers\Admin\ShiftHomeController;
use App\Http\Controllers\Admin\ShiftHomeItemController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SupportForumController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WatermarkController;
use App\Http\Controllers\Admin\CommercialPropertyController;
use App\Http\Controllers\Admin\MetaController;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['auth','is-agent'],'prefix'=>'iv-admin'],function(){


    Route::get('settings',[SettingsController::class,'index'])->name('settings.index');
    Route::post('settings-update',[SettingsController::class,'update'])->name('settings.update');


    Route::resource('user',UserController::class)->middleware('editor');
    Route::post('user/delete',[UserController::class,'delete'])->name('user.delete')->middleware('editor');;


    Route::resource('our-service',OurServiceController::class);
    Route::post('our-service/delete',[OurServiceController::class,'delete'])->name('our-service.delete')->middleware('editor');



    Route::resource('menu',MenuController::class);
    Route::post('menu/delete',[MenuController::class,'delete'])->name('menu.delete')->middleware('editor');

    Route::get('get-submenu/{id}',[MenuController::class,'getSubMenu'])->name('get.submenu');





    Route::resource('location',LocationController::class);
    Route::post('location/delete',[LocationController::class,'delete'])->name('location.delete')->middleware('editor');



    Route::resource('category',CategoryController::class);
    Route::post('category/delete',[CategoryController::class,'delete'])->name('category.delete')->middleware('editor');


    Route::resource('sub-category',SubCategoryController::class);
    Route::post('sub-category/delete',[SubCategoryController::class,'delete'])->name('sub-category.delete')->middleware('editor');



    Route::resource('child-category',ChildCategoryController::class);
    Route::post('child-category/delete',[ChildCategoryController::class,'delete'])->name('child-category.delete')
    ->middleware('editor');



    Route::resource('blog-category',BlogCategoryController::class);
    Route::post('blog-category/delete',[BlogCategoryController::class,'delete'])->name('blog-category.delete');


    Route::resource('blog',BlogController::class);
    Route::post('blog/delete',[BlogController::class,'delete'])->name('blog.delete');



    Route::resource('testimonial',TestimonialController::class);
    Route::post('testimonial/delete',[TestimonialController::class,'delete'])->name('testimonial.delete')->middleware('editor');


    Route::resource('feature',FeatureController::class);
    Route::post('feature/delete',[FeatureController::class,'delete'])->name('feature.delete')->middleware('editor');

    Route::resource('floor',FloorController::class);
    Route::post('floor/delete',[FloorController::class,'delete'])->name('floor.delete')->middleware('editor');


    Route::resource('road-size',RoadSizeController::class);
    Route::post('road-size/delete',[RoadSizeController::class,'delete'])->name('road-size.delete')->middleware('editor');


    Route::resource('property',PropertyController::class);
    Route::post('property/delete',[PropertyController::class,'delete'])->name('property.delete')->middleware('editor');
    Route::get('delete-photo/{id}',[PropertyController::class,'removePhoto'])->name('property-photo.delete');
    Route::get('delete-video/{id}',[PropertyController::class,'deleteVideo'])->name('property-video.delete');



    // residental property
    Route::resource('admin-residental-property',ResidentalPropertyController::class);


    // commercial Property
    Route::resource('admin-commercial-property',CommercialPropertyController::class);




    Route::resource('featured-property',FeaturedPropertyController::class);
    Route::post('featured-property/delete',[FeaturedPropertyController::class,'delete'])->name('featured-property.delete');


    Route::resource('recommended-property',RecommendedPropertyController::class);
    Route::post('recommended-property/delete',[RecommendedPropertyController::class,'delete'])->name('recommended-property.delete');



    // about us
    Route::get('about-us',[AboutUsController::class,'index'])->name('about-us.index');
    Route::post('about-us/update',[AboutUsController::class,'update'])->name('about-us.update');


    Route::resource('home-page-property',HomepageProductController::class);
    Route::post('home-page-property/delete',[HomepageProductController::class,'delete'])->name('home-page-property.delete');



    Route::resource('shift-home',ShiftHomeController::class);
    Route::post('shift-home/delete',[ShiftHomeController::class,'delete'])->name('shift-home.delete')->middleware('editor');



    Route::resource('partner',PartnerController::class);
    Route::post('partner/delete',[PartnerController::class,'delete'])->name('partner.delete')->middleware('editor');


    Route::resource('contact-us',ContactUsController::class);

    Route::post('contact-us',[ContactUsController::class,'delete'])->name('contact-us.delete')->middleware('editor');


    Route::get('find-room-change-status/{id}',[ContactUsController::class,'changeStatus'])->name('find-room.status');




    // faq

    Route::resource('faq',FAQController::class);
    Route::post('faq/delete',[FAQController::class,'delete'])->name('faq.delete')->middleware('editor');

    // newsletter
    Route::resource('newsletter',NewsletterController::class);
    Route::post('newsletter/delete',[NewsletterController::class,'delete'])->name('newsletter.delete')->middleware('editor');

    // purpose
    Route::resource('purpose',PurposeController::class);
    Route::post('purpose/delete',[PurposeController::class,'delete'])->name('purpose.delete')->middleware('editor');


    // purpose

    Route::resource('quick-link',QuickLinkController::class);
    Route::post('quick-link/delete',[QuickLinkController::class,'delete'])->name('quick-link.delete')->middleware('editor');



    // pages
     Route::resource('page',PageController::class);
     Route::post('page/delete',[PageController::class,'delete'])->name('page.delete')->middleware('editor');


    //  message
    Route::resource('message',MessageController::class);
    Route::post('message/delete',[MessageController::class,'delete'])->name('message.delete')->middleware('editor');

    // support forum
    Route::resource('support-forum',SupportForumController::class);
    Route::post('support-forum/delete',[SupportForumController::class,'delete'])->name('support-forum.delete')->middleware('editor');


    Route::get('mark-as-read/{id}',[ShiftHomeController::class,'changeRead'])->name('shift-home.read');


    Route::resource('shift-home-item',ShiftHomeItemController::class);
    Route::post('shift-home-item/delete',[ShiftHomeItemController::class,'delete'])->name('shift-home-item.delete')->middleware('editor');


    // boost
    Route::resource('boost-request',BoostController::class);
    Route::post('boost-request/delete',[BoostController::class,'delete'])->name('boost-request.delete')->middleware('editor');


      // boost feature


      Route::resource('boost-feature',BoostFeatureController::class);
      Route::post('boost-feature/delete',[BoostFeatureController::class,'delete'])->name('boost-feature.delete')->middleware('editor');


  // boost step


  Route::resource('boost-step',BoostingStepController::class);
  Route::post('boost-step/delete',[BoostingStepController::class,'delete'])->name('boost-step.delete')->middleware('editor');



       // advertisement
       Route::resource('advertisement',AdvertisementController::class);
       Route::post('advertisement/delete',[AdvertisementController::class,'delete'])->name('advertisement.delete')->middleware('editor');



       Route::resource('boost-content',BoostDetailController::class);


    //    shift home content
    Route::resource('shift-home-content',ShiftHomeContentController::class);



    // watermark
    Route::resource('watermark', WatermarkController::class);


    // watermark
    Route::resource('boost-subscription',BoostSubscriptionController::class);
    Route::post('boost-subscription/delete',[BoostSubscriptionController::class,'delete'])->name('boost-subscription.delete')->middleware('editor');



// Meta
    Route::resource('meta-tag',MetaController::class);
    Route::post('meta-tag/delete',[MetaController::class,'delete'])->name('meta-tag.delete')->middleware('editor');

});
