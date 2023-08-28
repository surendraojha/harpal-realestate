<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Http\Resources\FriendResource;
use App\Http\Resources\FriendUserResource;
use App\Http\Resources\GroupChatPayloadResource;
use App\Http\Resources\GroupChatResource;
use App\Http\Resources\GroupResource;
use App\Http\Resources\OnlyGroupResource;
use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\GroupChat;
use App\Models\GroupMember;
use App\Models\Message;
use App\Models\Setting;
use Exception;
use File;
use Illuminate\Support\Collection;
use Image;

class Helper
{




    public static function user($information){
        return [
                'id'=> $information->id,
                'name'=> $information->name,
                'email'=> $information->email,
                // 'username'=> $information->username,
                'phone'=> $information->phone,
                'photo'=> $information->photo ? asset('uploads/'.$information->photo) :($information->photo?asset('uploads/'.$information->photo):asset('storage/user-default.png')),
                // 'dob'=> $information->dob
            ];
    }

  



}
