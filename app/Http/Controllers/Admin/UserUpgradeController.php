<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserUpgrade;
use Illuminate\Http\Request;

class UserUpgradeController extends Controller
{
    public function index(){
        $data['informations'] = UserUpgrade::orderBy('id','DESC')
                                ->paginate(20);

        $data['module'] = "User Upgrade";
        return view('admin.user-upgrade.index',$data);
    }

    public function update(Request $request,$id){

        $information = UserUpgrade::findOrfail($id);
        $information->status = $request->status;
        $information->save();

        if($request->status==1){
            $user = User::find($information->user_id);
            $user->role = $information->role;
            $user->save();
        }else{

            $user = User::find($information->user_id);
            $user->role = $information->previous_role;
            $user->save();

        }

        return redirect()->back()->with('message','Role updated successfully!!');
    }
}
