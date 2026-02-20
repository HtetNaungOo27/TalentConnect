<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class HomeController extends Controller
{
    public function index(){
         $jobs = Job::where('status', 'approved') 
               ->latest()
               ->paginate(6);
        return view('pages.index')->with('jobs',$jobs);
    }
}
