<?php

namespace App\Http\Controllers;

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
    


    public function destroy(string $id)
    {
        //
    }
}
