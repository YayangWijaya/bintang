<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_candidate) {
            $applications = Application::where('user_id', auth()->id())->get();

            return view('admin.application.candidate', compact('applications'));
        }

        $jobs = Job::count();
        $jobViews = Job::sum('views');
        $candidates = Candidate::count();
        $applications = Application::count();

        return view('admin.index', compact('jobs', 'jobViews', 'candidates', 'applications'));
    }
}
