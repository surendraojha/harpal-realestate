<?php

namespace App\Providers;

use App\Models\AdvertisementPosition;
use App\Models\Property;
use App\Models\QuickLink;
use App\Models\Setting;
use App\Models\UserProfile;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Schema\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191);

        Paginator::useBootstrap();


        $setting = Setting::first();

        $residental_pending_property_count = Property::where('status',0)
                                ->where('category_id',1)
                                ->count();


        $commerical_pending_property_count = Property::where('status',0)
                                ->where('category_id',3)
                                ->count();

        // $pending_homestay_count = Property::where('status',0)->where('purpose_id',2)->count();

        view()->composer('*', function($view) use ($setting) {



            $top_wide_advertisements =    AdvertisementPosition::where('position','page-top')->get();

            $side_bar_ad = AdvertisementPosition::where('position','login-page')->get();

            $view->with(['setting' => $setting,'top_wide_advertisements'=>$top_wide_advertisements,'side_bar_ad'=>$side_bar_ad]);
        });

        view()->composer('admin.layouts.navbar', function($view) use ($residental_pending_property_count,$commerical_pending_property_count) {
            $view->with(['residental_pending_property_count' => $residental_pending_property_count,'commerical_pending_property_count'=>$commerical_pending_property_count]);
        });



        $quick_links = QuickLink::orderBy('order')->where('status',1)->get();


        view()->composer('front.layouts.footer', function($view) use ($quick_links) {
            $most_searched_locations = Property::orderBy('view')
                        ->limit(50)
                        ->pluck('location_id','location_id')
                        ->toArray();

            $most_searched_locations =array_unique($most_searched_locations);

            $most_searched_locations = \App\Models\Location::whereIn('id',$most_searched_locations)->limit(6)->get();

            $view->with(['quick_links' => $quick_links,'most_searched_locations'=>$most_searched_locations]);
        });




        view()->composer('front.layouts.profile', function($view) use ($quick_links) {


            $user = auth()->user();


            $profile = UserProfile::with('user')
                    ->where('user_id',$user->id)
                    ->first();


            $view->with(['profile' => $profile,

                    'user'=>$user]);
        });




         view()->composer('admin.*', function($view) {

            $user = auth()->user();
            $view->with(['user' => $user]);
        });


    }
}
