<?php

namespace App\Http\Controllers\Api;

use App\Enum\UserStatus;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactBackUp;
use App\Models\Document;
use App\Models\Memo;
use App\Models\Message;
use App\Models\Note;
use App\Models\NoteFolder;
use App\Models\Remainder;
use App\Models\RemainderPhoto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use Exception;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use Tymon\JWTAuth\JWTAuth;
use Storage;

class ProfileController extends Controller
{



    public function __construct(){
        $this->middleware('api-custom');
    }


    public function showProfile(){
        $user = auth('api')->user();

        $information = User::find($user->id);

        $arr = Helper::user($information);

        return response()->json(['data'=>$arr]);

    }


    public function updateProfile(Request $request){

        $user = auth('api')->user();


        $req = Validator::make($request->all(), [
            'name' => 'required',
            'country' => 'required',
            // 'email'=>'required|email|unique:users,email,'.$user->id,
            // 'phone'=>'required|numeric|digits:10|unique:users,phone,'.$user->id,

            'dob'=>'required'
            // 'username'=>'required|unique:users,username,'.$user->id,
        ]);

        if ($req->fails()) {
            return response()->json(['status'=>'failed','errors'=>$req->errors()], 422);
        }


        $information = User::where('id',$user->id)->firstorfail();
        $information->name = $request->name;
        $information->country = $request->country;
        // $information->email = $request->email;
        $information->dob = $request->dob;


        if(!$information->username){
            $information->username = $this->generateUsername($request->name);
        }
        // $information->phone = $request->phone;
        // $information->avatar_id = $request->avatar_id;
        if ($request->hasFile('photo')) {

                $file = $request->file('photo');

                 $old_path =storage_path().'/app/public/uploads/'.$information->photo;


                if (File::exists($old_path)) {
                    File::delete($old_path);
                }
                $filename = date('Ymdhis').$information->id . '.' . $file->getClientOriginalExtension();

                Storage::disk('local')->putFileAs(
                    'public/uploads/',
                    $file,
                    $filename
                );
                // $path = storage_path() . 'app/public/uploads/';


                // $file->move($path, $filename);

                $information->photo = $filename;

                $information->avatar_id = null;
        }


        $information->save();


        return response()->json(['status'=>'ALL_COMPLETED',
            'data'=>  Helper::user($information)
        ,'message'=>'Profile Updated Successfully!!!']);



    }


    public function generateUsername($name){

        $name = substr($name,0,2);
    $number = mt_rand(1000,99999);
    $username = 'DB'.$name.$number;


    if($this->usernameExists($username)){
        return $this->generateUsername($name);
    }

    return $username;
}

public function usernameExists($username){
    return User::where('username',$username)->exists();
}




    public function updateToken(Request $request){

        $user = auth('api')->user();
    try{


        $information = User::where('id',$user->id)->first();
        $information->fcm_token = $request->token;
        $information->save();


        return response()->json([
            'success'=>true
        ]);
    }catch(\Exception $e){
        report($e);
        return response()->json([
            'success'=>false
        ],500);
    }
}



        // change password
        public function changePassword(Request $request){
            $user = auth('api')->user();
            $information = User::find($user->id);
              $req = Validator::make($request->all(), [
            'current_password' => [
            'required', function ($attribute, $value, $fail) use ($information){
                if (!Hash::check($value, $information->password)) {
                    $fail('Current Password didn\'t match');
                }
                },
            ],
            'password' => 'required|min:8|confirmed',
        ]);

        if ($req->fails()) {
            return response()->json(['status'=>'error','errors'=>$req->errors()], 422);
        }

        $information->password_plain = $request->password;
        $information->password = Hash::make($request->password);
        $information->save();


        return response()->json(['status'=>'success','message'=>'Password Changed Successfully!!!']);

        }



//   public function refresh(Request $request) {
//             $token = $request->token;
//            try {
//             $token = FacadesJWTAuth::refresh($token);

//         } catch (TokenInvalidException $e) {
//             return response()->json(['status'=>'error','errors'=>['invalid_token'=>['Given Token is Invalid']]]);
//         }

//         return response()->json(['data'=>$token]);
//         // return $this->generateToken(auth('api')->refresh());
//     }

    public function refresh() {
        $token= $this->generateToken(auth('api')->refresh());
        $token = $token->original;

        return response()->json(['token'=>$token]);
    }



     protected function generateToken($token){
        return response()->json($token);
    }


      public function accountSetup(Request $request){

        $user = auth('api')->user();


        $req = Validator::make($request->all(), [
             'name' => 'required',
            'country' => 'required',
            // 'email'=>'required|email|unique:users,email,'.$user->id,
            // 'phone'=>'required|numeric|digits:10|unique:users,phone,'.$user->id,

            'dob'=>'required',
            // 'username'=>'required|unique:users,username,'.$user->id,
            'photo'=>'mimes:jpg,jpeg,gif,png,tiff'
        ]);

        if ($req->fails()) {
            return response()->json(['status'=>'failed','errors'=>$req->errors()], 422);
        }

        try{
        $information = User::where('id',$user->id)->firstorfail();
            $information->name = $request->name;

        if(!$information->username){
            $information->username = $this->generateUsername($request->name);
        }
        // $information->name = $request->name;
        $information->country = $request->country;
        // $information->email = $request->email;
        $information->dob = $request->dob;
        // $information->username = $request->username;
        // $information->phone = $request->phone;

        if ($request->hasFile('photo')) {

                $file = $request->file('photo');

                 $old_path =storage_path().'/app/public/uploads/'.$information->photo;


                if (File::exists($old_path)) {
                    File::delete($old_path);
                }
                $filename = date('Ymdhis').$information->id . '.' . $file->getClientOriginalExtension();

                Storage::disk('local')->putFileAs(
                    'public/uploads/',
                    $file,
                    $filename
                );
                // $path = storage_path() . 'app/public/uploads/';


                // $file->move($path, $filename);

                $information->photo = $filename;
                        $information->save();

        }
        }catch(Exception $e){

            return response()->json([

                'status'=>'error',

                'errors'=>['error'=>['Something Went Wrong!']]],422
            );
        }





        return response()->json([

            'status'=>UserStatus::ALL_COMPLETED,
            'data'=>  Helper::user($information)
        ,'message'=>'Account Setup Successfully!!!']);



    }



    public function deleteAccount(){

        $user_id = auth('api')->user()->id;


        try {
            //code...


        $information = User::find($user_id);


        // delete remainder photos

        $remainder_photos = RemainderPhoto::where('user_id',$user_id)->get();

        if($remainder_photos->isEmpty()==false){
            RemainderPhoto::where('user_id',$user_id)->delete();
        }

        // delete documents
        $documents = Document::where('user_id',$user_id)->get();

        if($documents->isEmpty()==false){
            foreach ($documents as  $value) {

               $path= 'public/documents/'.$value->document;

                $exists = Storage::disk('local')->has($path);

                if($exists){
                        Storage::disk('local')->delete($path);
                }


            }

        }

        // delete document folders

        $folder = Category::where('user_id',$user_id)->get();

        if($folder->isEmpty()==false){
            Category::where('user_id',$user_id)->delete();
        }




        // delete remainder notes and pending all remainder

        $remainder_memo = Remainder::where('user_id',$user_id)->get();

        if($remainder_memo->isEmpty()==false){
            Remainder::where('user_id',$user_id)->delete();
        }

        // delete notes
        $notes = Note::where('user_id',$user_id)->get();

        if($notes->isEmpty()==false){
            Note::where('user_id',$user_id)->delete();
        }
        // delete note folder

        $notes_folder = NoteFolder::where('user_id',$user_id)->get();
        if($notes_folder->isEmpty()==false){
            NoteFolder::where('user_id',$user_id)->delete();
        }
        // delete  goals

        $goals = Memo::where('user_id',$user_id)->get();

        if($goals->isEmpty()==false){
             Memo::where('user_id',$user_id)->delete();
        }

        // delete contacts

        $contact_backup = ContactBackUp::where('user_id',$user_id)->get();

        foreach ($contact_backup as  $value) {
              $path= 'public/backups/'.$value->pdf;

                $exists = Storage::disk('local')->has($path);

                if($exists){
                        Storage::disk('local')->delete($path);
                }

                $value->delete();
        }

        // delete message
        $messages = Message::where(function ($query) use ($user_id){
            $query->where('sender_id', '=', $user_id)
                    ->orWhere('receiver_id', '=', $user_id);
        })->get();


        foreach ($messages as $key => $value) {
            if($value->message_type=='photo'){

                $path= 'public/photos/'.$value->message;


            }elseif($value->message_type=='audio'){
                $path= 'public/audios/'.$value->message;


            }elseif($value->message_type=='video'){
                $path= 'public/videos/'.$value->message;


            }

            $exists = Storage::disk('local')->has($path);

                if($exists){
                        Storage::disk('local')->delete($path);
                }

            $value->delete();

        }

        // clear you in other user's end

        $you = User::where('you',$user_id)->first();

        if($you){
            $you->you=null;
            $you->save();
        }


        $information->delete();


          } catch (\Throwable $th) {
                    return response()->json(['status'=>'failed','message'=>$th],422);

        }


        return response()->json(['status'=>'success','message'=>'Account Deleted Successfully!!']);


    }


}
