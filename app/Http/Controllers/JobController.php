<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jobs = Job::withCount('applications')->when($request->keyword, function ($q) use ($request) {
                            $q->where('name', 'ILIKE', "%" . $request->keyword . "%");
                        })->orderBy('id','desc')->paginate(5);

        return view('admin.job.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        Job::create($request->all());

        return redirect()->route('job.index')->with('success','Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('admin.job.show',compact('job'));
    }

    public function edit(Job $job)
    {
        return view('job.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $request->validate([
            //
        ]);

        $job->update($request->all());

        return redirect()->route('job.index')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        DB::beginTransaction();

        try {
            if ($job->applications()->exists()) {
                return redirect()->route('job.index')->with('error', 'Lowongan ini mempunyai data Kandidat. Silahkan hapus data Kandidat terlebih dahulu');
            }

            $job->delete();
            DB::commit();
            return redirect()->route('job.index')->with('success','Data berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('job.index')->with('error', $e->getMessage());
        }
    }

    public function apply(Job $job)
    {

    }
}
