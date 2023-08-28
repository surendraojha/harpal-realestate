<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\FindMeRoom;
use App\Mail\ShiftHomeMail;
use App\Models\AboutUs;
use App\Models\AdvertisementPosition;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BoostFeature;
use App\Models\BoostingStep;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\CustomerStory;
use App\Models\FAQ;
use App\Models\Feature;
use App\Models\FeaturedProperty;
use App\Models\FinancialSupport;
use App\Models\Floor;
use App\Models\HomePageProduct;
use App\Models\Location;
use App\Models\Message;
use App\Models\Meta;
use App\Models\NewsLetter;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\PropertyPhoto;
use App\Models\Province;
use App\Models\Purpose;
use App\Models\RecommendedProperty;
use App\Models\RoadSize;
use App\Models\Setting;
use App\Models\ShiftHome;
use App\Models\ShiftHomeItem;
use App\Models\SupportForum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Menu\Laravel\Facades\Menu;
use Spatie\Menu\Laravel\Link;

class FrontendController extends Controller
{

    public function index()
    {
        $meta = Meta::where('module', 'Home Page')->first();
        $testimonials = CustomerStory::where('status', '!=', '0')->orderBy('order')->get();

        $categories = Category::with('subcategory')->orderBy('order')->has('subcategory')->get();

        $locations = Location::orderBy('order')->where('status', 1)->get();


        $recommended_properties = RecommendedProperty::orderBy('order')->with('property')->limit(5)->get();

        $featured_properties = FeaturedProperty::orderBy('order')->with('property')->limit(5)->get();

        $new_deals = Property::orderBy('id', 'DESC')->where('status', '!=', '0')->limit(12)->get();

        $about_us = AboutUs::first();


        $homepage_categories =  Category::whereNull('parent')->orderBy('order')->get();

        $homepage_properties = HomePageProduct::orderBy('order')
                                ->pluck('property_id', 'property_id')
                                ->toArray();


        $partners = Partner::where('status', '1')->limit(6)->orderBy('order')->get();





        // for filtering
        // $max = Property::selectRaw("Max(CAST(price AS UNSIGNED)) as price")
        //             ->where('status','!=','0')
        //             ->first()
        //             ->price;

        // $min = Property::selectRaw("MIN(CAST(price AS UNSIGNED)) as price")
        //         ->where('status','!=','0')
        //         ->first()
        //         ->price;


        $forums = SupportForum::where('status', '!=', '0')
            ->whereNull('parent')
            ->orderBy('id', 'DESC')
            ->limit(2)
            ->get();

        $above_featured = AdvertisementPosition::where('position', 'above-featured-product')->get();

        // dd($above_featured);
        $below_featured = AdvertisementPosition::where('position', 'below-featured-product')->get();





        $between_home_page_product = AdvertisementPosition::where('position', 'between-home-page')->get();

        $below_home_page_product = AdvertisementPosition::where('position', 'below-home-page-product')->get();


        $below_new_deals = AdvertisementPosition::where('position', 'below-new-deals')->get();

        $below_forum = AdvertisementPosition::where('position', 'below-forum')->get();

        $below_recommended = AdvertisementPosition::where('position', 'below-recommended')->get();

        $below_about_us = AdvertisementPosition::where('position', 'below-about-us')->get();


        $data['categories'] = $categories = Category::orderBy('order')->whereNull('parent')->where('status', 1)->get();

        $data['purposes'] = Purpose::orderBy('order')->get();

        $data['recent_properties'] = Property::where('status', 1)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();


        $data['recommended_properties'] = RecommendedProperty::
            orderBy('id', 'desc')
            ->limit(8)
            ->get();

        $data['main_categories'] = Category::where('depth',1)->get();

        $data['featured_properties'] = FeaturedProperty::orderBy('order')->get();

        $data['provinces'] = Province::orderBy('id')->get();



        return view('front-new.index', $data);


        return view(
            'front.index',
            compact(
                'testimonials',
                'categories',
                'locations',
                'recommended_properties',
                'featured_properties',
                'new_deals',
                'about_us',
                'homepage_categories',
                'homepage_properties',
                'partners',
                'forums',
                // 'max',
                // 'min',


                'above_featured',

                'below_featured',
                'between_home_page_product',
                'below_home_page_product',


                'below_new_deals',

                'below_forum',

                'below_recommended',

                'below_about_us',
                'category',
                'meta'
            )
        );
    }
    public function financialSupport(){

        $data['financial_support'] = FinancialSupport::orderBy('order')->get();


        return view('front-new.financial-support',$data);
    }

    public function rentalHome()
    {

        $testimonials = CustomerStory::where('status', '!=', '0')->orderBy('order')->get();

        $categories = Category::with('subcategory')->orderBy('order')->has('subcategory')->get();

        $locations = Location::orderBy('order')->get();


        $recommended_properties = RecommendedProperty::orderBy('order')->with('property')->get();

        $featured_properties = FeaturedProperty::orderBy('order')->with('property')->get();

        $new_deals = Property::orderBy('id', 'DESC')->limit(10)->get();

        $about_us = AboutUs::first();


        $homepage_categories =  Category::whereNull('parent')->orderBy('order')->get();
        $homepage_properties = HomePageProduct::orderBy('order')->pluck('property_id', 'property_id')->toArray();


        $partners = Partner::where('status', '1')->orderBy('order')->get();


        // for filtering
        $max = Property::max('price');
        $min = Property::min('price');

        $forums = SupportForum::where('status', '!=', '0')
            ->whereNull('parent')
            ->orderBy('id', 'DESC')
            ->limit(2)
            ->get();


        return view(
            'front.index',
            compact(
                'testimonials',
                'categories',
                'locations',
                'recommended_properties',
                'featured_properties',
                'new_deals',
                'about_us',
                'homepage_categories',
                'homepage_properties',
                'partners',
                'forums',
                'max',
                'min'
            )
        );
    }


    // blog listing
    public function blog(Request $request){

        $category_id = 0;
        if($request->slug){
            $category = BlogCategory::where('slug',$request->slug)->firstOrfail();
            $category_id = $category->id;
        }


         $informations = Blog::orderBy('id','DESC');

        if($category_id){
            $informations = $informations->where('category_id',$category_id);
        }


         $data['informations'] = $informations->paginate(6);

        $data['categories'] = BlogCategory::where('slug','!=',$request->slug)->get();



        $data['recent_blogs'] = Blog::orderBy('id','DESC')
                                ->offset(6)
                                ->limit(6)
                                ->get()
                                ->shuffle();
        return view('front-new.blog.blog-listing',$data);

    }



    // blog detail page

    public function blogDetail($slug){
        $data['information']=$information = Blog::where('slug',$slug)->firstOrfail();
        $data['recent_blogs'] = Blog::orderBy('id','DESC')->where('slug','!=',$slug)
                                ->limit(6)
                                ->get();

        $data['categories'] = BlogCategory::where('id','!=',$information->category_id)->get();


        return view('front-new.blog.blog-detail',$data);
    }


    public function shifthome()
    {

        $shift_home_items = ShiftHomeItem::orderBy('order')->where('status', 1)->get();
        $meta = Meta::where('module', 'Shift Home Page')->first();
        return view(
            'front.shift-home.index',
            compact('shift_home_items', 'meta')
        );
    }
    public function shiftHomePost(Request $request)
    {



        if ($request->when == 'Instant Booking') {
            $rules = [
                'type' => 'required',
                'pick_up_location' => 'required',
                'drop_off_location' => 'required',
                'phone' => 'required',
                'when' => 'required'

            ];
        } else {
            $rules = [
                'type' => 'required',
                'pick_up_location' => 'required',
                'drop_off_location' => 'required',
                'phone' => 'required',
                'email' => 'email|required',
                'when' => 'required',
                'schedule_time' => 'required',
                'schedule_date' => 'required'
            ];
        }

        $request->validate($rules);

        $information = new ShiftHome();
        $information->type = $request->type;
        $information->pick_up_location = $request->pick_up_location;
        $information->drop_off_location = $request->drop_off_location;
        $information->phone = $request->phone;
        $information->email = $request->email;
        $information->when = $request->when;
        $information->schedule_time = $request->schedule_time;

        $information->message = $request->message;

        $information->schedule_date = $request->schedule_date;

        $arr = [];

        for ($i = 0; $i < count($request->item_id); $i++) {

            if ($request->item_quantity[$i] != 0) {
                $a = [];
                $a['item'] = $request->item_id[$i];
                $a['quantity'] = $request->item_quantity[$i];
                $arr[] = $a;
            }
        }

        $information->items = json_encode($arr);

        if ($request->hasFile('deposit_slip')) {
            $file = $request->file('deposit_slip');
            $extension = '.' . $request->file('deposit_slip')->extension();
            $path = public_path() . '/uploads/';
            $filename = date('ymdhis') . $extension;
            $file->move($path, $filename);
            $information->deposit_slip = $filename;
        }
        $information->save();


        $setting = Setting::first();

        Mail::to($setting->email)->send(new ShiftHomeMail($information));


        return redirect()
            ->route('front.home')
            ->with('message', 'Shift Request is sent successfully!!');
    }


    public function contactUsForm()
    {
        return view('front-new.contact-us');
    }

    public function contactUsPost(Request $request)
    {

        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            // 'total_area'=>'required',
            // 'message'=>'required',
            // 'location'=>'required',
            // 'rental_type'=>'required',
            // 'deposit_slip'=>'mimes:JPG,jpg,JPEG,jpeg,png,PNG,pdf,PDF|image'
        ];

        $request->validate($rules);

        $information = new ContactUs();
        $information->name = $request->name;
        $information->phone = $request->phone;
        $information->email = $request->email;
        $information->message = $request->message;
        $information->total_area = $request->total_area ?? '';
        $information->location = $request->location ? json_encode($request->location) : '';
        $information->rental_type = $request->rental_type ? json_encode($request->rental_type) : '';

        if ($request->hasFile('deposit_slip')) {
            $file = $request->file('deposit_slip');
            $extension = '.' . $request->file('deposit_slip')->extension();
            $path = public_path() . '/uploads/';
            $filename = date('ymdhis') . $extension;
            $file->move($path, $filename);
            $information->deposit_slip = $filename;
        }

        $information->save();
        $setting = Setting::first();
        Mail::to($setting->email)->send(new FindMeRoom($information));

        return redirect()->route('front.home')
            ->with('message', 'Thank you for your request , you will get a call from our representative soon');
    }


    public function message()
    {
        $data['meta'] = $meta = Meta::where('module', 'Contact Us Page')->first();

        return view('front-new.message', $data);

        return view(
            'front.message',
            compact('meta')
        );
    }

    public function messagePost(Request $request)
    {
        $rules = [
            // 'contact_for'=>'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ];

        $request->validate($rules);

        $information = new Message();

        $information->contact_for = $request->contact_for ?? '';
        $information->name = $request->name;
        $information->email = $request->email;
        $information->phone = $request->phone;
        $information->message = $request->message;
        $information->user_id = $request->user_id??null;
        $information->save();

        $setting = Setting::first();

        if($information->user_id){
            $user = User::find($information->user_id);

            $emails =[$setting->email,$user->email];

        }else{
            $emails =[$setting->email];

        }

        Mail::to($emails)->send(new FindMeRoom($information));


        return redirect()->back()->with('message', 'Your Message Is Received, We will contact you sortly!!');
    }





    public function showPropertyDetail($slug)
    {






        $information = Property::where('slug', $slug)->firstOrFail();
        $information->overview = str_replace("&nbsp;", " ", $information->overview);
        $information->overview  = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $information->overview);

        $user = auth()->user();

        if ($user) {
            if (!$user->id == $information->user_id) {
                $information->view = $information->view + 1;
            }
        } else {
            $information->view = $information->view + 1;
        }
        $information->save();
        $additional_features = PropertyFeature::where('property_id', $information->id)->get();



        // faqs

        $faqs = FAQ::where('property_id', $information->id)->orderBy('order')->get();


        $forums = SupportForum::where('property_id', $information->id)
            ->whereNull('parent')
            ->orderBy('id', 'desc')
            ->paginate(2);

        $advertisement = AdvertisementPosition::where('position', 'single-page-sidebar')->get();

        $price = (float) str_replace(',', '', $information->price);

        // dd($information->price);

        $recommended_properties = Property::where(function ($q) use ($information, $price) {
            $q->where('price', '<=', $price)
                ->orWhere('category_id', $information->category_id)
                ->orWhere('sub_category_id', $information->sub_category_id)
                ->orWhere('location_id', $information->location_id);
        })->where('status', '!=', '0')->limit(10)->get();


        return view('front-new.property.show',
            compact(
                'information',
                'additional_features',
                'faqs',
                'forums',
                'advertisement',
                'recommended_properties'
            )
        );

        return view(
            'front.property.show',
            compact(
                'information',
                'additional_features',
                'faqs',
                'forums',
                'advertisement',
                'recommended_properties'
            )
        );
    }



    // newsletter

    public function newsletterPost(Request $request)
    {

        $rules = [
            'email' => 'unique:news_letters,email|max:100'
        ];

        $request->validate($rules);

        $information = new NewsLetter();
        $information->email = $request->email;
        $information->save();

        return redirect()->back()->with('message', 'Thank You For Subscribing!!');
    }

    public function findMeRoom()
    {
        // dd('here');

        $meta = Meta::where('module', 'Find Me Room Page')->first();
        $locations = Location::orderBy('order')->where('status', '!=', '0')->get();
        $categories = Category::with('subcategory')->orderBy('order')->has('subcategory')->get();

        return view(
            'front.find-me-room',
            compact('locations', 'categories', 'meta')
        );
    }

    public function topRated()
    {
        $informations = Property::orderBy('view', 'DESC')
            ->where('status', '!=', 0)->limit(60)
            ->paginate(10);
        $meta = Meta::where('module', 'Top Rated Page')->first();
        $locations = Location::orderBy('order')->where('status', 1)->get();

        $categories = Category::with('subcategory')->orderBy('order')->has('subcategory')->get();

        return view(
            'front.top-rated',
            compact(
                'informations',
                'locations',
                'categories',
                'meta'
            )
        );
    }

    public function aboutUs()
    {
        $information = AboutUs::first();
        $meta = Meta::where('module', 'Aboutus Page')->first();
        $testimonials = CustomerStory::orderBy('order')->get();

        return view(
            'front-new.about-us',
            compact('information', 'meta', 'testimonials')
        );
        return view(
            'front.about-us',
            compact('information', 'meta', 'testimonials')
        );
    }

    public function faq()
    {
        $data['informations'] = $faqs = FAQ::orderBy('order')->where('status', '!=', '0')->paginate(20);

        return view('front-new.faq', $data);
        return view(
            'front.faq',
            compact('faqs')
        );
    }

    public function page($slug)
    {


        $information = Page::where('slug', $slug)->where('status', '!=', '0')->firstorFail();

        return view(
            'front.page',
            compact('information')
        );
    }

    public function partner()
    {
        $informations = Partner::orderBy('order')->where('status', '!=', '0')->get();
        $meta = Meta::where('module', 'Partner Page')->first();

        return view('front.partner', compact('informations', 'meta'));
    }
    public function boost()
    {

        $boost_steps = BoostingStep::orderBy('order')->get();

        $boost_features = BoostFeature::orderBy('order')->get();

        $meta = Meta::where('module', 'Boost Detail Page')->first();


        return view('front.boost-detail', compact('boost_steps', 'boost_features', 'meta'));
    }


    // show properties by location

    public function propertyByLocation(Request $request, $location)
    {

        $order = $request->order;

        $information = Location::where('location', $location)->where('status', '!=', 0)->firstOrfail();

        $informations = Property::where('location_id', $information->id);
        $locations = Location::orderBy('order')->where('status', 1)->get();

        $categories = Category::with('subcategory')->orderBy('order')->has('subcategory')->get();

        if ($order) {


            if ($order == 'latest') {
                $informations = $informations->orderBy('id', 'DESC');
            } elseif ($order == 'oldest') {
                $informations = $informations->orderBy('id');
            } elseif ($order == 'lowest-price') {
                $informations = $informations->orderBy('price');
            } elseif ($order == 'highest-price') {
                $informations = $informations->orderBy('price', 'DESC');
            }
        } else {
            $informations = $informations->orderBy('created_at', 'DESC');
        }




        $informations = $informations->paginate(30);


        return view(
            'front.location',
            compact(
                'information',
                'informations',
                'order',
                'locations',
                'categories'
            )
        );
    }


    // featured
    public function featured(Request $request)
    {

        $order = $request->order;
        // $title = 'Featured Properties';

        $setting = Setting::first();
        $title = $setting->featured_term;


        $informations = FeaturedProperty::select('featured_properties.*', 'properties.price as price')
            ->join('properties', 'properties.id', '=', 'featured_properties.property_id');



        $locations = Location::orderBy('order')->where('status', 1)->get();

        $categories = Category::with('subcategory')->orderBy('order')->has('subcategory')->get();

        if ($order) {


            if ($order == 'latest') {
                $informations = $informations->orderBy('id', 'DESC');
            } elseif ($order == 'oldest') {
                $informations = $informations->orderBy('id');
            } elseif ($order == 'lowest-price') {
                $informations = $informations->orderBy('properties.price');
            } elseif ($order == 'highest-price') {
                $informations = $informations->orderBy('properties.price', 'DESC');
            }
        } else {
            $informations = $informations->orderBy('order');
        }




       $data['informations'] = $informations = $informations->paginate(20);

       $data['title'] = "Featured Property";

       $data['meta'] = $meta = Meta::where('module', 'Featured Page')->first();


        return view('front-new.featured-listing',$data);

        return view(
            'front.featured-recommended',
            compact(
                'title',
                'informations',
                'order',
                'locations',
                'categories',
                'meta'
            )
        );
    }

    // recommended
    public function recommended(Request $request)
    {

        $order = $request->order;

        $setting = Setting::first();
        $title = $setting->recommended_term;
        // $title = 'Recommended Properties';
        $meta = Meta::where('module', 'Recommended Page')->first();

        $informations = RecommendedProperty::select('recommended_properties.*', 'properties.price as price')
            ->join('properties', 'properties.id', '=', 'recommended_properties.property_id');

        $locations = Location::orderBy('order')->where('status', 1)->get();

        $categories = Category::with('subcategory')->orderBy('order')->has('subcategory')->get();



        if ($order) {


            if ($order == 'latest') {
                $informations = $informations->orderBy('properties.id', 'DESC');
            } elseif ($order == 'oldest') {
                $informations = $informations->orderBy('properties.id');
            } elseif ($order == 'lowest-price') {
                $informations = $informations->orderBy('properties.price');
            } elseif ($order == 'highest-price') {
                $informations = $informations->orderBy('properties.price', 'DESC');
            }
        } else {


            $informations = $informations->orderBy('order');
        }




        $informations = $informations->paginate(20);



        // $informations = $informations->sortBy('properties.id',SORT_REGULAR,false)

        return view(
            'front.featured-recommended',
            compact(
                'title',
                'informations',
                'order',
                'locations',
                'categories',
                'meta'
            )
        );
    }
    // new deals
    public function newDeals(Request $request)
    {

        $order = $request->order;
        $setting = Setting::first();
        $title = $setting->new_deals_term;

        $meta = Meta::where('module', 'New Deals Page')->first();
        $locations = Location::orderBy('order')->where('status', 1)->get();

        $categories = Category::with('subcategory')->orderBy('order')->has('subcategory')->get();

        $informations = Property::where('status', '!=', '0');

        if ($order) {


            if ($order == 'latest') {
                $informations = $informations->orderBy('id', 'DESC');
            } elseif ($order == 'oldest') {
                $informations = $informations->orderBy('id');
            } elseif ($order == 'lowest-price') {
                $informations = $informations->orderBy('price');
            } elseif ($order == 'highest-price') {
                $informations = $informations->orderBy('price', 'DESC');
            }
        }


       $data['informations'] = $informations = $informations->paginate(20);

        $data['title'] = "Latest Properties";
        $advertisements = AdvertisementPosition::where('position', 'page-top')->get();

        return view('front-new.normal-listing',$data);
        return view(
            'front.new-deals',
            compact(
                'title',
                'informations',
                'order',
                'advertisements',
                'locations',
                'categories',
                'meta'
            )
        );
    }





    // category
    public function category(Request $request, $slug)
    {
        $order = $request->order;

        $meta =  $information = Category::where('slug', $slug)->firstOrFail();


        $informations = Property::where(function ($query) use ($information) {
            $query->where('category_id', $information->id)
                ->orWhere('sub_category_id', $information->id);
        });


        $locations = Location::orderBy('order')->where('status', 1)->get();

        $categories = Category::with('subcategory')->orderBy('order')->has('subcategory')->get();

        if ($order) {


            if ($order == 'latest') {
                $informations = $informations->orderBy('id', 'DESC');
            } elseif ($order == 'oldest') {
                $informations = $informations->orderBy('id');
            } elseif ($order == 'lowest-price') {
                $informations = $informations->orderBy('price');
            } elseif ($order == 'highest-price') {
                $informations = $informations->orderBy('price', 'DESC');
            }
        } else {
            $informations = $informations->orderBy('id', 'DESC');
        }

        $informations = $informations->where('status', '!=', '0')->paginate(20);
        return view(
            'front.category',
            compact(
                'information',
                'meta',
                'informations',
                'order',
                'locations',
                'categories'
            )
        );
    }



    public function viewProfile($email)
    {
        $information = User::where('email', $email)->firstOrFail();

        $properties = Property::where('user_id', $information->id)->paginate(10);

        $properties_count = Property::where('user_id', $information->id)->count();

        return view(
            'front.profile.index',

            compact('information', 'properties', 'properties_count')
        );
    }


    public function gallery(){
        $data['informations'] = PropertyPhoto::orderBy('created_at','DESC')
                                ->paginate(20);

        return view('front-new.gallery',$data);

    }
}
