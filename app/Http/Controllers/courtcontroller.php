<?php

namespace App\Http\Controllers;

use App\Models\asignBenchmodel;
use App\Models\hearingmodel;
use App\Models\registercasemodel;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class courtcontroller extends Controller
{
    public function causelistdate()
    {
        $users = User::with('roles')->where('role', '!=', 2)->get();
        // $districts = districtmodel::all();
        return view('court.causelistdate', compact('users'));
    }
    public function causelistcourt(Request $request)
    {
        $selectedDate = $request->input('selected_date');

        $cases = asignBenchmodel::whereDate('hearing_date', $selectedDate)->get();
        // dd($request->all());
        return view('court.causelist')->with('cases', $cases)->with('selectedDate', $selectedDate);
    }
    public function hearingdate()
    {
        $users = User::with('roles')->where('role', '!=', 2)->get();
        // $districts = districtmodel::all();
        // $users = registercasemodel::with('district')->get();
        return view('court.hearingdate', compact('users'));
    }

    public function hearingentry(Request $request)

    {
        // $users = User::with('roles')->where('role', '!=', 2)->get();
        $selectedDate = $request->input('selected_date');

        $hearing = DB::table('assignbench')
            ->join('registercase', 'assignbench.acknowledgment_number', '=', 'registercase.acknowledgment_number')
            ->join('district', 'registercase.pdistrict', '=', 'district.id')
            ->whereDate('assignbench.hearing_date', $selectedDate) // Add the whereDate condition here
            ->select('assignbench.*', 'registercase.*', 'district.*', 'assignbench.id as assignbench_id')
            ->get();
        return view('court.hearingentry')->with('hearing', $hearing)->with('selectedDate', $selectedDate);
    }
    // public function hearingentrycreate(Request $request){
    //     dd($request->all());
    //       // dd($request->all());
    //     return view('court.hearingentrycreate');
    // }
    public function hearingentrycreate($assignbench_id)
    {

        // Assuming you have a model named Hearing to fetch the case details
        // $case = asignBenchmodel::find($assignbench_id);
        $case = DB::table('assignbench')
            ->join('registercase', 'assignbench.acknowledgment_number', '=', 'registercase.acknowledgment_number')
            ->where('assignbench.id', $assignbench_id)
            ->select('assignbench.*', 'registercase.*')
            ->first();

        if (!$case) {
            return redirect()->back()->with('error', 'Case not found');
        }

        return view('court.hearingentrycreate', ['case' => $case]);
    }


    public function submitHearing(Request $request)
    {
        $data = $request->all();
        $selectedDate = $request->input('hearing_date'); // Access selectedDate from the request
        // Log::info('Selected Date: ' . $selectedDate);

        // Join the tables and fetch the data
        $caseDetails = DB::table('registercase')
            ->join('approvedcases', 'registercase.acknowledgment_number', '=', 'approvedcases.acknowledgment_number')
            ->join('assignbench', 'approvedcases.acknowledgment_number', '=', 'assignbench.acknowledgment_number')
            ->select('assignbench.*', 'registercase.*', 'approvedcases.*')
            ->where('registercase.acknowledgment_number', $data['acknowledgment_number'])
            ->where('assignbench.hearing_date', $selectedDate) // Add whereDate condition
            ->first();

        if (!$caseDetails) {
            return redirect()->back()->with('error', 'Case details not found!');
        }

        // Generate PDF
        $pdf = FacadePdf::loadView('pdf.hearing', ['data' => $data, 'caseDetails' => $caseDetails]);

        // Ensure unique PDF name
        $uniqueId = uniqid();  // Generate a unique identifier
        $pdfPath = 'public/hearings/' . $data['acknowledgment_number'] . '_' . $uniqueId . '.pdf';

        // Save PDF to storage
        Storage::put($pdfPath, $pdf->output());

        // Save PDF path to database
        $hearing = new hearingmodel();
        $hearing->acknowledgment_number = $data['acknowledgment_number'];
        $hearing->hearing_date = $data['hearing_date'];
        $hearing->pdf_path = $pdfPath;
        $hearing->publishstatus = 0;
        $hearing->save();

        return redirect()->back()->with('success', 'Hearing details saved successfully!');
    }





    public function hearingentryprevious($assignbench_id)
    {
        // Fetch acknowledgment_number from assignbench table using assignbench_id
        $case = DB::table('assignbench')
            ->where('id', $assignbench_id)
            ->select('acknowledgment_number')
            ->first();

        if (!$case) {
            return redirect()->back()->with('error', 'Case not found');
        }

        $acknowledgment_number = $case->acknowledgment_number;

        // Fetch case_number from approvedcases table
        $approvedCase = DB::table('approvedcases')
            ->where('acknowledgment_number', $acknowledgment_number)
            ->select('case_number')
            ->first();

        if (!$approvedCase) {
            return redirect()->back()->with('error', 'Approved case not found');
        }

        $case_number = $approvedCase->case_number;

        // Fetch hearing details from hearingdetails table ordered by hearing_date
        $hearingDetails = DB::table('hearingdetails')
            ->where('acknowledgment_number', $acknowledgment_number)
            ->orderBy('hearing_date', 'desc')
            ->get();

        return view('court.hearingentryprevious', compact('hearingDetails', 'acknowledgment_number', 'case_number'));
    }
}
