<?php

namespace App\Http\Controllers\Molbio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\State;
use Auth;
use Illuminate\Support\Carbon;

class DeviceController extends Controller
{
    public function DeviceAll(){

        $device = Device::latest()->get();
        return view('backend.device.device_all',compact('device'));

    } // End Method 

    public function DeviceAdd(){

        $states = \App\Models\State::all();
        return view('backend.device.device_add', compact('states'));
    } // End Method 

    public function DeviceStore(Request $request){

        Device::insert([

            'name' => $request->name,
            'state_id' => $request->state_id,
            'trueprep'=>$request->trueprep,
            'truelab'=>$request->truelab,
            'date' => date('Y-m-d', strtotime($request->date)),
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Device Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('device.all')->with($notification); 

    } // End Method 
    public function DeviceEdit($id){

        $state = State::all();
        $device = Device::findOrFail($id);
        return view('backend.device.device_edit',compact('device','state'));
    } // End Method 



    public function DeviceUpdate(Request $request){

        $device_id = $request->id;

         Device::findOrFail($device_id)->update([

            'name' => $request->name,
            'state_id' => $request->state_id,
            'trueprep'=>$request->trueprep,
            'truelab'=>$request->truelab,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Device Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('device.all')->with($notification); 


    } // End Method 

    public function DeviceDelete($id){

        Device::findOrFail($id)->delete();
             $notification = array(
             'message' => 'Device Deleted Successfully', 
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification); 
 
     } // End Method 
}
