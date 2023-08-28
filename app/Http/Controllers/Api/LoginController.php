<?php

namespace App\Http\Controllers\Api;

use App\Enum\UserStatus;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\AccountVerification;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cookie;
use Laravel\Passport\HasApiTokens\token;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{

    public function construct()
    {
        // $this->middleware('guest:api');
    }

    protected function loginRules()
    {
        return [
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ];
    }



    protected function loginValidationErrorMessages()
    {
        return [];
    }



    public function login(Request $request)
    {





        $req = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($req->fails()) {
            return response()->json([
                'message' => $req->errors()
            ], 422);
        }













        // // $






        if (!$token =    auth('api')->attempt($req->validated())) {

            return response()->json([
                'data' => [
                    'status' => 'FAILED'
                ],
                'message' => 'Invalid OTP!!'
            ], 422);
            return response()->json(['status' => 'error', 'errors' => ['invalid' => ['Unauthorized']]], 401);
        }
        $user = auth('api')->user();



        $information = User::where('id', $user->id)->firstOrfail();

        if ($request->fcm_token) {
            $information->fcm_token = $request->fcm_token;
            $information->save();
        }


        if (!$information->email_verified_at) {


            $information->token = random_int(100000, 999999);
            $information->save();

            // Mail::to($user->email)->send(new AccountVerification($information));



            // enum
            // verified ,unverified , profile_pending, authenticated
            // status inside data



            // return response()->json([
            //     'data' => [
            //         'status' => UserStatus::VERIFICATION_REMAINING,
            //         'access_token' => $token,
            //         'token_type' => 'bearer',
            //         'fcm_token' => $information->fcm_token,
            //         // 'expires_in' => auth('api')->factory()->getTTL() * 60,
            //         'user' => Helper::user($information)
            //     ]
            // ], 200);
        }



        if (!$information->profile) {


            return response()->json([
                'data' => [


                    'status' => 'PROFILE_PENDING',
                    'access_token' => $token,

                    'token_type' => 'bearer',
                    // 'expires_in' => auth('api')->factory()->getTTL() * 60,
                    'user' => Helper::user($information)
                ]
            ], 200);
        }


        return  response()->json([
            'data' => [
                'status' => 'ALL_COMPLETED',
                'access_token' => $token,
                'token_type' => 'bearer',
                'fcm_token' => $information->fcm_token,

                // 'expires_in' => auth('api')->factory()->getTTL() * 60,
                'user' => Helper::user($information)
            ]
        ], 200);
    }

    /**
     * Token refresh
     */
    public function user()
    {
        return response()->json(auth()->user());
    }


    public function refresh()
    {
        return $this->generateToken(auth('api')->refresh());
    }



    protected function generateToken($token)
    {
        return response()->json($token);
    }


    public function logout()
    {




        try {
            // Adds token to blacklist.
            $forever = true;
            JWTAuth::getToken(); // Ensures token is already loaded.
            JWTAuth::invalidate($forever);

            // JWTAuth::parseToken()->invalidate( $forever );

            return response()->json([
                'status'   => 'success',
                'message' => "Logged out successfully!!"
            ]);
        } catch (TokenExpiredException $exception) {
            return response()->json([
                'status'   => 'error',
                'errors' => ["expired" => ["Token is expired"]]

            ], 403);
        } catch (TokenInvalidException $exception) {
            return response()->json([
                'status'   => 'error',
                'errors' => ["invalid" => ["Token is invalid"]]
            ], 401);
        } catch (JWTException $exception) {
            // return response()->json( [
            //     'error'   => true,
            //     'errors' => "Auth Token Missing"
            // ], 500 );

            return response()->json([
                'status'   => 'error',
                'errors' => ["invalid" => ["Auth Token Missing"]]
            ], 401);
        }


        // JWTAuth::invalidate($forever);


        // $forever = true;



        //     JWTAuth::parseToken()->invalidate( $forever );

        return response()->json(['status' => 'success', 'message' => 'Logged out successfully!!']);
    }
}
