<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = auth()->user()->employer->jobs; 
        return view('my_job.index', compact('jobs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('my_job.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'salary' => 'required|numeric',
            'location' => 'required|string',
            'category' => 'required|string',
            'experience' => 'required|in:entry,intermediate,senior',
        ]);

        $employer = auth()->user()->employer;
        $employer->jobs()->create($validatedData);
        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
