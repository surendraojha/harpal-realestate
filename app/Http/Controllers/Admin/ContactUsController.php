<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use File;
class ContactUsController extends Controller
{

    public $module;
    public function __construct()
    {
        $this->module = 'Find Me Room';
    }
    public function index(Request $request)
    {

        // dd('here');
        //
        $keyword = $request->keyword;
        $informations = ContactUs::orderBy('id','DESC');




        if($keyword){


            $informations =  $informations ->where(function($q) use ($keyword){
            $q->where('name', 'like', '%' . $keyword . '%')
              ->orwhere('phone', 'like', '%' . $keyword . '%')
              ->orwhere('total_area', 'like', '%' . $keyword . '%')
              ->orwhere('location', 'like', '%' . $keyword . '%')
              ->orwhere('message', 'like', '%' . $keyword . '%')
              ->orwhere('rental_type', 'like', '%' . $keyword . '%');


        });

    }



        $informations = $informations->paginate(50);

        return view('admin.contact-us.index',
            compact('informations','keyword')
        );
    }


    // show page

    public function show($id){
        $information = ContactUs::findOrfail($id);
        $module = $information->name.'-'.$this->module;
        return view('admin.contact-us.show',
            compact(
                'information',
                'module'
            )
        );

    }

    public function changeStatus($id){
        $information = ContactUs::findOrfail($id);

        if($information->read==1){
            $alert_type = 'message';
            $message="Marked As Undone Successfully!!";
            $information->read=0;
        }else{
             $alert_type = 'message';
             $message="Marked As Done Successfully!!";
             $information->read=1;
        }


        $information->save();


        return redirect()->back()->with($alert_type,$message);
    }




    public function delete(Request $request){
        $id = $request->id;

        $informations = ContactUs::whereIn('id',$id)->get();


        if($informations->isEmpty()==false){
            foreach ($informations as  $value) {
                $old_file = public_path().'/uploads/'.$value->deposit_slip;

                if(File::exists($old_file)){
                    File::delete($old_file);
                }

                $value->delete();
            }


            return redirect()->back()->with('message','Find me room request deleted successfully!!');
        }

            return redirect()->back()->with('error','Item Not Found or Already Deleted!!');



    }
}
