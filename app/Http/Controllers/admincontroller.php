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
        // Get the selected rows from the request
        $selectedRows = $request->input('selectedRows');
        // dd($request->all());

        // Check if any rows are selected
        if (empty($selectedRows)) {
            return redirect()->back()->with('error', 'No items selected for publishing.');
        }
        try {
            // Update the publish status of selected hearings
            hearingmodel::whereIn('acknowledgment_number', $selectedRows)->update(['publishstatus' => true]);
            //  dd($request->all());
            // Optionally, you can retrieve the published data to send to the frontend
            // $publishedData = hearingmodel::whereIn('id', $selectedRows)->get();

            // Redirect to a route with success message and data
            return redirect()->back()->with('message', 'Published successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to publish: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to publish. Please try again.');
        }
    }
    // this is optional;
    public function success()
    {
        // Retrieve the success message and published data from the session
        $message = session('message');
        $publishedData = session('publishedData');

        // Return view with success message and data
        return view('publish.success', compact('message', 'publishedData'));
    }
}
