<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public $module;
     public function __construct()
     {
        $this->module = 'User';
     }
    public function index(Request $request)
    {

        $keyword = $request->keyword;

        $informations = User::orderBy('id','DESC');


        if($keyword){
            $informations = $informations->where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                      ->orWhere('email', 'like', '%' . $keyword . '%')
                      ->orWhere('role', 'like', '%' . $keyword . '%');

            });
        }


        $informations=$informations->paginate(30);



        $module = $this->module;
        return view('admin.user.index',
            compact('informations',
            'module',
            'keyword'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'name' =>'required|min:3',
            'password'=>'required|min:8|confirmed',
            'email'=>'required|unique:users,email',
            'status'=>'required'
        ];


        $request->validate($rules);
        $information = new User();
        $information->name = $request->name;
        $information->email = $request->email;
        // $information->profile_photo_path = asset('public/uploads/');
        $information->password = Hash::make($request->password);
        $information->role= $request->role;

        $information->status = $request->status;
        // $information->plain_password = $request->password;
        // $information->type = $request->type;
        $information->save();




        Session::flash('message', 'System User registered successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information  = User::find($id);

        $module = $this->module;

        return view('admin.user.edit',
            compact('information','module')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' =>'required|min:3',
            'email'=>'required|unique:users,email,'.$id,
            'role'=>'required',
            'status'=>'required'
        ];


        $request->validate($rules);

        $information = User::find($id);
        $information->name = $request->name;
        $information->email = $request->email;
        $information->role = $request->role;

        $information->status = $request->status;
        $information->save();


        Session::flash('message', 'System User updated successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('user.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {




            $users = User::whereIn('id',$request->id)->get();

            $properties = Property::whereIn('user_id',$request->id)->get();


            if($properties->isEmpty()==false){
                    Session::flash('error', 'Cannot delete one of selected item has properties!');
                    Session::flash('alert-class', 'alert-danger');
                            return redirect()->route('user.index');

            }

            if($users->isEmpty()==false){
                foreach ($users as  $value) {
                    $value->delete();
                }



                 Session::flash('message', 'System User deleted successfully!');
                Session::flash('alert-class', 'alert-danger');




        }else{

            Session::flash('error', 'Please select atleast one user for delete operation!');
            Session::flash('alert-class', 'alert-danger');

        }



        return redirect()->route('user.index');
    }
}
