<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{

    
    
    public function create()
    {
        return view('employer.create');
    }

    public function store(Request $request)
    {
        auth()->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|min:3|unique:employers,company_name'
            ])
        );

        return redirect()->route('jobs.index')
            ->with('success', 'Your employer account was created!');
    }

    public function index()
    {
      // Fetch all job applications for the jobs posted by the authenticated employer
      $applications = auth()->user()->employer->jobs()
      ->with('jobApplications')->get();
  
      return view('employer.index', compact('applications'));
    }

}