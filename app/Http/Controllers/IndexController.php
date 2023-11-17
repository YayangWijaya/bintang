<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyJobRequest;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

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

    public function applyJob(ApplyJobRequest $request, Job $job)
    {
        DB::beginTransaction();

        try {
            if (count($job->candidates()->where('ktp_number', $request->ktp_number)->get()) > 0) {
                return redirect()->back()->with('error', 'Kandidat sudah pernah melamar lowongan ini');
            }

            $md5Ktp = md5($request->ktp_number);
            $cvFn = $request->file('cv')->getClientOriginalName();
            $cv = $request->file('cv')->storeAs("public/cv/{$md5Ktp}", $cvFn);

            $photoFn = $request->file('photo')->getClientOriginalName();
            $photo = $request->file('photo')->storeAs("public/photo/{$md5Ktp}", $photoFn);

            $data = $request->all();
            $data['cv'] = $cv;
            $data['photo'] = $photo;

            $job->candidates()->create($data);
            DB::commit();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil melamar lowongan ini. Anda akan dihubungi kembali maksimal 7 hari kerja. Terimakasih.');
    }
}
