<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\UserProfile;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{

    public function index(){
        $user =auth()->user();
        $user_id = $user->id;

        $profile = UserProfile::with('user')
        ->where('user_id',$user->id)
        ->first();
        $informations = WishList::where('user_id',$user_id)->get();


        return view('front.wish-list.index',
            compact('informations','user','profile')
        );
    }

    public function addToWishList($property_id){
        $user_id = auth()->user()->id;

        $information = WishList::where('property_id',$property_id)
                        ->where('user_id',$user_id)->first();


        if($information){
            return redirect()->back()->with('error','Selected Property is already on wishlist');

        }







        $information = new WishList();
        $information->property_id = $property_id;
        $information->user_id = $user_id;

        $information->save();


        $informations = WishList::where('user_id',$user_id)->count();

        // return response()->json(['wishlist_count'=>$informations]);

        return redirect()->back()->with('message','Property is added to wishlist successfully');
    }



    public function removeFromWishList($property_id){
        $user_id = auth()->user()->id;


        $information = WishList::where('property_id',$property_id)
                        ->where('user_id',$user_id)->firstorFail();
        $information->delete();

        return redirect()->back()->with('message','Property is removed from wishlist successfully');
    }
}
