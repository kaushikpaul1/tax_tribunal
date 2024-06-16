<?php

namespace App\Http\Controllers;

use App\Models\approvedcasemodel;
use App\Models\asignBenchmodel;
use App\Models\districtmodel;
use App\Models\registercasemodel;
use App\Models\rejectcasemodel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class registercaseController extends Controller
{
    public function dashboardDealing()
    {
        return view('dealing.dashboard');
    }
    public function registercase()
    {
        $users = User::with('roles')->where('role', '!=', 3)->get();
        $districts = districtmodel::all();
        return view('dealing.registercase', compact('users', 'districts'));
    }
    public function storecase(Request $request)
    {

        try {
            $data = new registercasemodel();
            $data->casetype = $request->casetype;
            $data->benchtype = $request->benchtype;
            $data->paymentdetails = $request->paymentdetails;
            $data->pfname = $request->pfname;
            $data->pmname = $request->pmname;
            $data->plname = $request->plname;
            $data->pemail = $request->pemail;
            $data->pmobile = $request->pmobile;
            $data->pstate = $request->pstate;
            $data->pdistrict = $request->pdistrict;
            $data->rdept = $request->rdept;
            $data->rdesig = $request->rdesig;
            $data->advocname = $request->advocname;
            $data->status = 0;
            // Generate acknowledgment number
            $lastCaseNumber = registercasemodel::max('id');
            $newCaseNumber = str_pad($lastCaseNumber + 1, 3, '0', STR_PAD_LEFT); // Assuming maximum 9999 cases
            $acknowledgmentNumber = "AKW-$newCaseNumber-" . date('Y-m-d'); // Example: AKW-0001-20240515

            $data->acknowledgment_number = $acknowledgmentNumber;
            // dd($request->all());
            $data->save();
            // return redirect(route('create'));
            // return redirect()->route('registercase')->with('success', 'Data successfully saved!');
            return redirect()->route('registercase')->with('success', 'Your application is successfully submitted. Acknowledgment Number: ' . $acknowledgmentNumber);
        } catch (\Exception $e) {
            // Log::error('Error saving data: ' . $e->getMessage());
            return redirect()->route('registercase')->with('error', 'Failed to register your case.');
        }
    }


    public function allcase()
    {
        $users = User::with('roles')->where('role', '!=', 3)->get();
        $users = registercasemodel::with('district')->get();
        // $users = registercasemodel::where('status', 0)->get();

        return view('dealing.allcase', compact('users'));
    }
    public function approveCase($id, Request $request)
    {
        try {
            $case = registercasemodel::find($id);

            if (!$case) {
                return redirect()->route('allcase')->with('error', 'Case not found.');
            }

            // Create new record in the approved cases table
            $approvedCase = new approvedcasemodel();

            $approvedCase->acknowledgment_number = $case->acknowledgment_number;
            $approvedCase->status = 1;


            // Generate acknowledgment number
            $lastCaseNumber = approvedcasemodel::max('id');
            $newCaseNumber = str_pad($lastCaseNumber + 1, 3, '0', STR_PAD_LEFT); // Assuming maximum 9999 cases
            $caseNumber = "CASE-$newCaseNumber-" . date('Y-m-d'); // Example: AKW-0001-20240515

            $approvedCase->case_number = $caseNumber;

            // Repeat this for all other fields
            $approvedCase->save();

            // Update status of the original case
            $case->status = 1; // Assuming 1 represents approved status
            $case->save();



            return redirect()->route('allcase')->with('success', 'Case approved successfully.');
        } catch (\Exception $e) {
            Log::error("Error approving case: " . $e->getMessage());
            return redirect()->route('allcase')->with('error', 'Error approving case: ' . $e->getMessage());
        }
    }




    public function approvedlist()
    {
        $approve = User::with('roles')->where('role', '!=', 3)->get();
        $approve = DB::table('approvedcases')
            ->join('registercase', 'approvedcases.acknowledgment_number', '=', 'registercase.acknowledgment_number')
            ->join('district', 'registercase.pdistrict', '=', 'district.id')
            ->select('approvedcases.*', 'registercase.*', 'district.*', 'approvedcases.id as approvedcase_id')
            ->get();

        return view('dealing.approvecase', compact('approve'));
    }

    public function rejectCase($id, Request $request)
    {
        try {
            $case = registercasemodel::find($id);

            if (!$case) {
                return redirect()->route('allcase')->with('error', 'Case not found.');
            }

            // Create new record in the approved cases table
            $rejectCase = new rejectcasemodel();

            $rejectCase->acknowledgment_number = $case->acknowledgment_number;
            $rejectCase->status = 2;
            $rejectCase->reason = $request->reason;

            // Repeat this for all other fields
            $rejectCase->save();

            // Update status of the original case
            $case->status = 2; // Assuming 2 represents reject status
            $case->save();



            return redirect()->route('allcase')->with('success', 'Case Rejected');
        } catch (\Exception $e) {
            Log::error("Error Rejecting case: " . $e->getMessage());
            return redirect()->route('allcase')->with('error', 'Error Rejecting case: ' . $e->getMessage());
        }
        return view('allcase', compact('reject'));
    }


    public function rejectedlist()
    {
        $reject = User::with('roles')->where('role', '!=', 3)->get();
        $reject = DB::table('rejectcase')
            ->join('registercase', 'rejectcase.acknowledgment_number', '=', 'registercase.acknowledgment_number')
            ->join('district', 'registercase.pdistrict', '=', 'district.id')
            ->select('rejectcase.*', 'registercase.*', 'district.*')
            ->get();

        return view('dealing.rejectcase', compact('reject'));
    }

    public function Assignbenchform(Request $request)
    {
        $selectedCases = $request->input('selectedCases');

        if (is_null($selectedCases) || !is_array($selectedCases)) {
            return redirect()->back()->withErrors(['message' => 'No valid cases selected']);
        }
        $cases = ApprovedCaseModel::whereIn('approvedcases.acknowledgment_number', $selectedCases)
            ->join('registercase', 'approvedcases.acknowledgment_number', '=', 'registercase.acknowledgment_number')
            ->select('approvedcases.*', 'registercase.*')
            ->get();
        // dd($request->all());


        // return view('dealing.assignbench', compact('cases'));
        return view('dealing.assignbench', compact('cases'));
    }


    public function assignBench(Request $request)
    {

        $validatedData = $request->validate([
            'bench' => 'required',
            'judgeName' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'acknowledgment_number' => 'required|string',
            'case_number' => 'required|string',
        ]);

        // Split the acknowledgment numbers and case numbers into arrays
        $acknowledgmentNumbers = explode(',', $request->acknowledgment_number);
        $caseNumbers = explode(',', $request->case_number);

        // Ensure the arrays are of the same length
        if (count($acknowledgmentNumbers) !== count($caseNumbers)) {
            return redirect()->back()->withErrors(['message' => 'Mismatch in acknowledgment numbers and case numbers']);
        }
        // dd($request->all());

        // Loop through each acknowledgment number and case number and create a record
        for ($i = 0; $i < count($acknowledgmentNumbers); $i++) {
            $assignbench = new asignBenchmodel();
            $assignbench->acknowledgment_number = trim($acknowledgmentNumbers[$i]);
            $assignbench->case_number = trim($caseNumbers[$i]);
            $assignbench->bench = $request->bench;
            $assignbench->judge_name = $request->judgeName;
            $assignbench->hearing_date = $request->date;
            $assignbench->hearing_time = $request->time;
            $assignbench->save();
        }

        return redirect()->back()->with('success', 'Cause List Generation successfully.');
    }
    public function causelist()
    {
        $users = User::with('roles')->where('role', '!=', 3)->get();
        // $districts = districtmodel::all();
        return view('dealing.causelist', compact('users'));
    }
    public function showcauselist(Request $request)
    {
        $selectedDate = $request->input('selected_date');

        $cases = asignBenchmodel::whereDate('hearing_date', $selectedDate)->get();
        // dd($request->all());
        return view('dealing.showcauselist')->with('cases', $cases)->with('selectedDate', $selectedDate);
    }
}
