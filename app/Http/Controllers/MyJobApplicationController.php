<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{

    public function index()
    {
        
    
        return view(
            'my_job_application.index',
            [
                'applications' => auth()->user()->jobApplications()// to retrieve all the job application
                ->with(
                    [
                        'job' => fn($query) => $query->withCount('jobApplications')// to count total number of applicants
                            ->withAvg('jobApplications', 'expected_salary'),// to calculate the average expected salary of all applicants
                        'job.employer'
                    ]
                ) 
                ->latest()
                ->get()
            ]
        );
    
    }



 /**
 * Deletes a job application.
 
 */
public function destroy(JobApplication $myJobApplication)
{
    try {
        // Attempt to delete the job application
        $myJobApplication->delete();

        // Flash a success message to the session for display on the next page
        return redirect()->back()->with('success', 'Job application removed.');
    } catch (\Exception $e) {
        // Handle potential deletion errors gracefully
        // (e.g., log the error, display a user-friendly error message)
        return redirect()->back()->with('error', 'An error occurred while deleting the job application. Please try again.');
    }

   /* 
    $myJobApplication->delete();

    return redirect()->back()->with(
        'success',
        'Job application removed.'
    ); 
    
    */
}
}
