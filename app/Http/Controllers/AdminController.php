<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Report;
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
        $applications = Application::where('terminated', false)->get();
        $terminateds = Application::where('terminated', true)->get();
        $report = Report::with(['items'])->where('date', date('Y-m'))->first();

        return view('admin.index', compact('jobs', 'jobViews', 'candidates', 'applications', 'terminateds', 'report'));
    }
}
