<?php

namespace App\Http\Controllers;

use App\Models\hearingmodel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class admincontroller extends Controller
{
    public function hearingdateadmin()
    {
        $users = User::with('roles')->where('role', '!=', 3)->get();
        return view('admin.hearingdate', compact('users'));
        // return view('admin.hearingdate');
    }
    public function hearingadmin(Request $request)

    {
        // $users = User::with('roles')->where('role', '!=', 2)->get();
        $selectedDate = $request->input('selected_date');
        // Log::info('Selected Date: ' . $selectedDate);

        // $hearingview = DB::table('hearingdetails')
        //     ->join('registercase', 'hearingdetails.acknowledgment_number', '=', 'registercase.acknowledgment_number')
        //     ->join('approvedcases', 'hearingdetails.acknowledgment_number', '=', 'approvedcases.acknowledgment_number')
        //      ->leftjoin('assignbench', 'hearingdetails.acknowledgment_number', '=', 'assignbench.acknowledgment_number')
        //     ->whereDate('hearingdetails.hearing_date', $selectedDate) // Add the whereDate condition here
        //     ->select('hearingdetails.*', 'registercase.*', 'approvedcases.*','hearingdetails.hearing_date as hearingdetails_hearing_date')
        //     ->get();
        $hearingDetails = DB::table('hearingdetails')
            ->join('registercase', 'hearingdetails.acknowledgment_number', '=', 'registercase.acknowledgment_number')
            ->join('approvedcases', 'hearingdetails.acknowledgment_number', '=', 'approvedcases.acknowledgment_number')
            ->whereDate('hearingdetails.hearing_date', $selectedDate) // Filter by selected date
            ->select('hearingdetails.*', 'registercase.*', 'approvedcases.*', 'hearingdetails.hearing_date as hearingdetails_hearing_date')
            ->get();

        $assignBench = DB::table('assignbench')
            ->whereDate('hearing_date', $selectedDate) // Filter by selected date
            ->select('hearing_time', 'acknowledgment_number')
            ->get();

        // Merge the two collections based on acknowledgment_number
        $hearingview = $hearingDetails->map(function ($item) use ($assignBench) {
            $assignedData = $assignBench->firstWhere('acknowledgment_number', $item->acknowledgment_number);
            $item->hearing_time = $assignedData ? $assignedData->hearing_time : null;
            return $item;
        });
        return view('admin.hearingview')->with('hearingview', $hearingview)->with('selectedDate', $selectedDate);
    }



















    
    public function publish(Request $request)
    {
        // Validate the request
        $request->validate([
            'selectedRows' => 'required|array',
            'selectedRows.*' => 'exists:hearingdetails,id', // Assuming 'hearings' is your model table name
        ]);
    
        // Get the selected hearing IDs from the request
        $selectedRows = $request->input('selectedRows');
    
        try {
            // Update the publish status of selected hearings
            hearingmodel::whereIn('id', $selectedRows)->update(['publishstatus' => 1]);
    
            // Optionally, you can retrieve the published data to send to the frontend
            $publishedData = hearingmodel::whereIn('id', $selectedRows)->get();
    
            // Redirect to a route with success message and data
            return redirect()->route('admin.hearingview')->with('message', 'Published successfully.')->with('publishedData', $publishedData);
        } catch (\Exception $e) {
            // Handle exception if any
            return redirect()->back()->with('error', 'Failed to publish. Please try again.');
        }
    }
    public function success()
    {
        // Retrieve the success message and published data from the session
        $message = session('message');
        $publishedData = session('publishedData');

        // Return view with success message and data
        return view('publish.success', compact('message', 'publishedData'));
    }
}
