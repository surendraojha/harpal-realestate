<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use File;
use Image;


class WatermarkController extends Controller
{
    public $module;

    public function __construct()
    {
        $this->module = 'Watermark';
    }
    public function index(){
        $module = $this->module;
        return view('admin.watermark.index',
            compact('module')
        );
    }

    public function store(Request $request){
        $rules = [
            'watermark'=>'image'
        ];
        try {
            $request->validate($rules);

            if($request->hasFile('watermark')){

                $information = Setting::first();
                $file = $request->file('watermark');

                $old_path = public_path() . '/uploads/' . $information->watermark;


                if (File::exists($old_path)) {
                    File::delete($old_path);
                }

                $path = public_path() . '/uploads/';

                $filename = date('Ymdhis') . '-' . $file->getClientOriginalName();

                $file->move($path, $filename);

                $information->watermark = $filename;
                $information->save();

                return redirect()
                ->back()
                ->with('message','Watermark Updated Successfully!!');
                ;

            }
        } catch (\Throwable $th) {
            throw $th;
        }




        return redirect()
            ->back()
            ->with('error','Watermark is not selected !!');
            ;



    }
}
