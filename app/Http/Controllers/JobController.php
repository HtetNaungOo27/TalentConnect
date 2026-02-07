<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access;
class JobController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::paginate(9);

        return view('jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('company_logo'));
        $title = $request->input('title');
        $description = $request->input('description');

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'contact_email' => 'required|string',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website' => 'nullable|url'
        ]);

        //hard coded user id
        $validatedData['user_id']=auth()->user()->id;
        //check for image
        if($request->hasFile('company_logo')){
            //store the file and get path
            $path = $request->file('company_logo')->store('logos','public');

            //add path to validated data
            $validatedData['company_logo'] = $path;
        }
        //submit to database
        Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success','Job listing created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show')->with('job',$job);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //check if user is authorize
        $this->authorize('update',$job);
        
        return view('jobs.edit')->with('job',$job);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job): string
    {
        //check if user is authorize
        $this->authorize('update',$job);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'contact_email' => 'required|string',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website' => 'nullable|url'
        ]);

        // Check for image
        if ($request->hasFile('company_logo')) {
            // Delete old logo
            Storage::delete('public/logos/' . basename($job->company_logo));

            // Store the file and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add path to validated data
            $validatedData['company_logo'] = $path;
        }

        // Submit to database
        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //check if user is authorize
        $this->authorize('update',$job);

        //if logo then delete it
        if($job->company_logo){
            Storage::delete('public/logos/' . $job->company_logo);
        }
        $job->delete();

        //check if delete from dashboard
        if(request()->query('from')=='dashboard'){
            return redirect()->route('dashboard')->with('success', 'Job listing deleted successfully!');
        }
        
        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully!');
    }

    public function search(Request $request)
    {
        $keywords = strtolower($request->input('keywords'));
        $location = strtolower($request->input('location'));

        $query = Job::query();

        if ($keywords) {
            $query->where(function ($q) use ($keywords) {
                $q->whereRaw('LOWER(title) like ?', ['%' . $keywords . '%'])
                    ->orWhereRaw('LOWER(description) like ?', ['%' . $keywords . '%'])
                    ->orWhereRaw('LOWER(tags) like ?', ['%' . $keywords . '%']);
            });
        }

        if ($location) {
            $query->where(function ($q) use ($location) {
                $q->whereRaw('LOWER(address) like ?', ['%' . $location . '%'])
                    ->orWhereRaw('LOWER(city) like ?', ['%' . $location . '%'])
                    ->orWhereRaw('LOWER(state) like ?', ['%' . $location . '%'])
                    ->orWhereRaw('LOWER(zipcode) like ?', ['%' . $location . '%']);
            });
        }

        $jobs = $query->paginate(12);

        return view('jobs.index')->with('jobs', $jobs);
    }
}
