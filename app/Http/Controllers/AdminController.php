<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jobs = Job::count();
        $jobViews = Job::sum('views');
        $candidates = Candidate::count();
        $candidatePassed = Candidate::where('step', 5)->count();

        return view('admin.index', compact('jobs', 'jobViews', 'candidates', 'candidatePassed'));
    }
}
