<?php

use App\Http\Controllers\BackupController;
use App\Http\Controllers\common\ChangePasswordController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\FrontendController;
use App\Models\Advertisement;
use App\Models\AdvertisementPosition;
use App\Models\BoostPost;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\CustomerStory;
use App\Models\FAQ;
use App\Models\Meta;
use App\Models\NewsLetter;
use App\Models\Partner;
use App\Models\Property;
use App\Models\ShiftHome;
use App\Models\SupportForum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Menu;
// use App\Models\MenuList;

use Illuminate\Support\Facades\Route;
// use Menu;
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
Route::get('/migrate',function(){
    \Artisan::call('migrate');
    // \Artisan::call('db:seed');
});


Route::get('/storage-link',function(){
    \Artisan::call('storage:link');
    // \Artisan::call('db:seed');
});


Route::get('/cache',function(){
    \Artisan::call('config:cache');
    \Artisan::call('view:cache');
    // \Artisan::call('route:cache');


    // \Artisan::call('optimize');
});




Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::get('back-up',[BackupController::class,'our_backup_database']);



Route::get('/make-password', function () {


   return Hash::make('admin@admin');


});




Route::group(['middleware'=>['auth']],function(){
    Route::get('change-password',[ChangePasswordController::class,'showForm'])->name('change.password');
    Route::post('change-password',[ChangePasswordController::class,'changePassword'])->name('change.password');

});


Route::get('/forgot-password', function () {

    $advertisement = AdvertisementPosition::where('position','login-page')->get();

    $meta = Meta::where('module','Forget Password Page')->first();


    return view('auth.forgot-password',
        compact('advertisement','meta')
    );
    
})->middleware('guest')->name('password.request');

Route::middleware(['auth:sanctum', 'verified','is-agent'])->get('/dashboard', function () {

  return redirect()->route('dashboard');
});



Route::middleware(['auth:sanctum', 'verified','is-agent'])->get('/iv-admin', function () {

    $home_stays = Property::count();

    $rental_properties = Property::where('purpose_id','!=',2)->count();
    $faqs = FAQ::count();
    $shift_homes = ShiftHome::count();

    $users = User::where('role','user')->where('status',1)->count();

    $partners = Partner::count();
    $testimonials = CustomerStory::count();


    $news_letter_subscribers = NewsLetter::count();


    $categories = Category::whereNull('parent')->count();
    $subcategories = Category::whereNotNull('parent')->count();

    $latest_users = User::orderBy('id','desc')->paginate(10);

    $boost_request = BoostPost::where('status',0)->count();
    $find_me_room = ContactUs::where('read',0)->count();
    $advertisement = Advertisement::count();
    $forum = SupportForum::count();
    return view('dashboard',
    compact(
        'home_stays',
        'rental_properties',
        'faqs',
        'shift_homes',
        'users',
        'partners',
        'testimonials',
        'news_letter_subscribers',
        'categories',
        'subcategories',
        'latest_users',
        'boost_request',
        'find_me_room',
        'advertisement',
        'forum'
    )
    );
})->name('dashboard');



Route::get('/login',function(){
    return redirect('user-login');
})->name('login');

Route::post('custom-logout',[DashboardController::class,'logout'])->name('custom.logout');
include  __DIR__ . '/admin.php';
include  __DIR__ . '/agent.php';
include  __DIR__ . '/frontend.php';
