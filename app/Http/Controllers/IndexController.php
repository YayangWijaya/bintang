<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyJobRequest;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class IndexController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get();

        return view('index', [
            'jobs' => $jobs
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function job(Job $job)
    {
        $job->increment('views');

        return view('job', [
            'job' => $job
        ]);
    }

    public function apply(Job $job)
    {
        if (!auth()->check()) {
            return redirect()->route('signup')->with('referrer', Request::server('HTTP_REFERER'));
        }

        DB::beginTransaction();

        try {
            $exists = Application::whereUserId(auth()->id())->whereVacancyId($job->id)->exists();

            if ($exists) {
                return redirect()->back()->with('error', 'Anda sudah pernah melamar pekerjaan ini');
            }

            Application::create([
                'vacancy_id' => $job->id
            ]);

            DB::commit();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil melamar lowongan ini. Anda akan dihubungi kembali maksimal 7 hari kerja. Terimakasih.');
    }
}
