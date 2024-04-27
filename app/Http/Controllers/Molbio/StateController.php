<?php

namespace App\Http\Controllers\Molbio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use Auth;
use Illuminate\Support\Carbon;

class StateController extends Controller
{
    public function StateAll()
{
    $states = State::latest()->get(); // Correct variable name
    return view('backend.state.state_all', compact('states')); // Pass 'states' instead of 'state'
}

    public function StateAdd(){
        $states = State::all(); // Retrieve all states
        return view('backend.state.state_add', compact('states'));
       } // End Mehtod 
   
   
       public function StateStore(Request $request){
   
        State::insert([
               'name' => $request->name, 
               'created_by' => Auth::user()->id,
               'created_at' => Carbon::now(), 
   
           ]);
   
            $notification = array(
               'message' => 'State Inserted Successfully', 
               'alert-type' => 'success'
           );
   
           return redirect()->route('state.all')->with($notification);
   
       } // End Method 

       public function StateEdit($id){

        $state = State::findOrFail($id);
      return view('backend.state.state_edit',compact('state'));

  }// End Method 


   public function StateUpdate(Request $request){

      $state_id = $request->id;

      State::findOrFail($state_id)->update([
          'name' => $request->name, 
          'updated_by' => Auth::user()->id,
          'updated_at' => Carbon::now(), 

      ]);

       $notification = array(
          'message' => 'State Updated Successfully', 
          'alert-type' => 'success'
      );

      return redirect()->route('state.all')->with($notification);

  }// End Method 


  public function StateDelete($id){

        State::findOrFail($id)->delete();

     $notification = array(
          'message' => 'State Deleted Successfully', 
          'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);

  } // End Method 
}
