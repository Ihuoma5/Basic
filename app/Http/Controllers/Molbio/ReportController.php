<?php

namespace App\Http\Controllers\Molbio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\State;
use App\Models\Device;
use Auth;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function ReportAll(){

        $allData = Report::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.report.report_all',compact('allData'));

    } // End Method 

    public function ReportAdd(){

        $state = State::all();
        $device = Device::all();
        return view('backend.report.report_add',compact('state','device'));

    } // End Method 
    public function ReportStore(Request $request){

        if ($request->state_id == null) {
    
           $notification = array(
            'message' => 'Sorry you do not select any item', 
            'alert-type' => 'error'
        );
        return redirect()->back( )->with($notification);
        } else {
    
            $count_state = count($request->state_id);
            for ($i=0; $i < $count_state; $i++) { 
                $report = new Report();
                $report->date_faulty = date_faulty('Y-m-d', strtotime($request->date_faulty[$i]));
                $report->report_no = $request->report_no[$i];
                $report->state_id = $request->state_id[$i];
                $report->device_id = $request->device_id[$i];
                $report->fault_report = $request->fault_report[$i];
                $report->part_changed = $request->part_changed[$i];
                $report->date_returned = date_returned('Y-m-d', strtotime($request->date_returned[$i]));
                $report->date_received = date_received('Y-m-d', strtotime($request->date_received[$i]));
                $report->repair_remark = $request->repair_remark[$i];
                $report->created_by = Auth::user()->id;
                $report->status = '0';
                $report->save();
            } // end foreach
        } // end else 
    
        $notification = array(
            'message' => 'Data Save Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('report.all')->with($notification); 
        }// End Method 
        
        public function ReportDelete($id){

            Report::findOrFail($id)->delete();
    
             $notification = array(
            'message' => 'Report Iteam Deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    
        } // End Method 
    
    
        public function ReportPending(){
    
            $allData = Report::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
            return view('backend.report.report_pending',compact('allData'));
        }// End Method 

        public function ReportApprove($id){

            $report = Report::findOrFail($id);
            $device = Device::where('id',$report->device_id)->first();
    
            if($device->save()){
    
                Report::findOrFail($id)->update([
                    'status' => '1',
                ]);
    
                 $notification = array(
            'message' => 'Status Approved Successfully', 
            'alert-type' => 'success'
              );
        return redirect()->route('report.all')->with($notification); 
    
            }
    
        }// End Method 
}
