<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\SupportForum;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserUpgrade;
use Illuminate\Http\Request;
use File;

use Image;



class ProfileController extends Controller
{




    public function profile()
    {

        $user = auth()->user();


        $profile = UserProfile::with('user')
            ->where('user_id', $user->id)
            ->first();

        if (@$profile->you_own) {


            $you_own = json_decode($profile->you_own);
        } else {
            $you_own = [];
        }


        return view(
            'front.profile',
            compact('profile', 'user', 'you_own')
        );
    }

    public function requestUpgradeForm()
    {

        $information = auth()->user();
        $data = UserUpgrade::where('user_id', auth()->user()->id)

            ->get();


        return view(
            'front.request-upgrade',
            compact('information', 'data')
        );
    }

    public function requestUpgrade(Request $request)
    {

        $information = UserUpgrade::where('user_id', auth()->user()->id)
            ->where('status', 0)
            ->first();
        if (!$information) {
            $information = new UserUpgrade();

            $message = "Role request updated !!";
        } else {
            $message = "Role request updated !!";
        }
        $information->user_id = auth()->user()->id;
        $information->role = $request->role;
        $information->previous_role = auth()->user()->role;

        if ($request->role == 'user') {
            $information->status = 1;

            $user = User::find(auth()->user()->id);
            $user->role = $request->role;
            $user->save();
        }

        $information->save();

        return redirect()->back()->with('message', $message);
    }


    public function updateProfile(Request $request)
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        if (in_array($user->role, ['agent', 'agency'])) {

            $rules = [
                // 'name_append'=>'required',
                'name' => 'required',
                'phone' => 'required|unique:users,phone,' . $user_id,
                'email' => 'unique:users,email,' . $user_id,
                'country'=>'required',
                'experience'=>'required',
                'about_me'=>'required',
                // 'dob'=>'required',
                // 'user_type'=>'required',
                // 'you_own'=>'required',
                'photo' => 'image'

            ];
        } else {
            $rules = [
                // 'name_append'=>'required',
                'name' => 'required',
                'phone' => 'required|unique:users,phone,' . $user_id,
                'email' => 'unique:users,email,' . $user_id,
                'country'=>'required',
                // 'dob'=>'required',
                // 'user_type'=>'required',
                // 'you_own'=>'required',
                'photo' => 'image'

            ];
        }

        $request->validate($rules);
        // dd($request->all());


        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->name = $request->name;
        // $user->gender = $request->gender;

        $user->save();

        $information = UserProfile::where('user_id', $user_id)->first();

        if (!$information) {
            $information = new UserProfile();
        }

        $information->name_append = $request->name_append;
        $information->user_id = $user_id;
        // $information->dob = $request->dob;
        $information->user_type = $request->user_type ?? '';
        $information->phone = $request->phone;
        if ($request->you_own) {
            $information->you_own = json_encode($request->you_own);
        } else {
            $information->you_own = null;
        }

        $information->experience = $request->experience??null;
        $information->country = $request->country??null;
        $information->about_me = $request->about_me??null;
        $information->website = $request->website??null;
        $information->facebook = $request->facebook??null;
        $information->twitter = $request->twitter??null;
        $information->instagram = $request->instagram??null;
        $information->linkedin = $request->linkedin??null;



        if ($request->hasFile('photo')) {

            $old = public_path() . '/uploads/' . @$information->photo;

            if (File::exists($old)) {
                File::delete($old);
            }



            $image = $request->file('photo');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path() . '/uploads/';
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $image_name);


            $information->photo = $image_name;
        }

        $information->save();

        //  for locations


        // user_id
        // photo
        // phone
        // dob
        // user_type
        // you_own
        // property_location


        return redirect()->route('profile')->with('message', 'Profile Updated Successfully!!');
    }


    public function changePhoto()
    {
    }


    public function singleForum($id)
    {

        $information = SupportForum::findorFail($id);
        // dd($information->id);
        $user = auth()->user();
        // dd($user->id);
        $profile = UserProfile::with('user')
            ->where('user_id', $user->id)
            ->first();

        if ($information->user_id == $user->id) {
            return view(
                'front.property.single-forum',
                compact('information', 'user', 'profile')
            );
        } else {
            dd('Access Denied!!');
        }
    }

    public function myComments()
    {

        $user = auth()->user();
        $profile = UserProfile::with('user')
            ->where('user_id', $user->id)
            ->first();

        // $my_properties = Property::where('user_id',$user->id)->pluck('id','id')->toArray();

        $support_forums = SupportForum::whereNull('parent')->where('user_id', $user->id)->pluck('id', 'id');

        $replies = SupportForum::whereIn('parent', $support_forums)->where('user_id', '!=', $user->id)->get();

        // dd($replies);
        return view(
            'front.my-replies',
            compact('user', 'replies', 'profile')
        );
    }


    public function deleteComment($id)
    {
        $information = SupportForum::findorfail($id);
    }
}
