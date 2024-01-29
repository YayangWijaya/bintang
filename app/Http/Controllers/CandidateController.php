<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Jobs\SendCandidateStatusUpdatedJob;
use App\Jobs\SendCandidateTerminatedJob;
use App\Models\Application;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $candidates = Candidate::when($request->keyword, function ($q) use ($request) {
                            $q->where('name', 'ILIKE', "%" . $request->keyword . "%");
                        })->orderBy('id','desc')->paginate(5);

        return view('admin.candidate.index', compact('candidates'));
    }

    public function create()
    {
        return view('candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        $request->validate([
            //
        ]);

        Candidate::create($request->all());

        return redirect()->route('candidate.index')->with('success','Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        return view('candidate.show',compact('candidate'));
    }

    public function edit(Candidate $candidate)
    {
        return view('candidate.edit',compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $request->validate([
            //
        ]);

        $candidate->update($request->all());

        return redirect()->route('candidate.index')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidate.index')->with('success','Data berhasil dihapus.');
    }

    public function process(Application $application)
    {
        if ($application->step <= 5) {
            dispatch(new SendCandidateStatusUpdatedJob($application));
        }

        $application->increment('step');

        return redirect()->back()->with('success', 'Sukses proses kandidat ke tahap selanjutnya');
    }

    public function terminate(Application $application)
    {
        $application->update(['terminated' => true]);
        dispatch(new SendCandidateTerminatedJob($application));
        return redirect()->back()->with('success', 'Berhasil membuat kandidat tidak lolos');
    }
}
