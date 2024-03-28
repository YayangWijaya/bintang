<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $applications = Application::when($request->keyword, function ($q) use ($request) {
                            return $q->whereHas('candidate', function ($r) use ($request) {
                                return $r->where('name', 'ILIKE', "%" . $request->keyword . "%")
                                            ->orWhere('email', 'ILIKE', "%" . $request->keyword . "%")
                                            ->orWhere('phone', 'ILIKE', "%" . $request->keyword . "%")
                                            ->orWhere('ktp_number', 'ILIKE', "%" . $request->keyword . "%");
                            });
                        })->when($request->step && $request->step !== "", function ($q) use ($request) {
                            return $q->where('step', $request->step);
                        })->when($request->vacancy_id && $request->vacancy_id !== "", function ($q) use ($request) {
                            return $q->where('vacancy_id', $request->vacancy_id);
                        })->when($request->location && $request->location !== "", function ($q) use ($request) {
                            return $q->whereHas('job', function ($r) use ($request) {
                                return $r->where('location', $request->location);
                            });
                        })
                        ->orderBy('id','desc')->paginate(5);

        $jobs = Job::get();

        return view('admin.application.index', compact('applications', 'jobs'));
    }

    public function create()
    {
        return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        $request->validate([
            //
        ]);

        Application::create($request->all());

        return redirect()->route('application.index')->with('success','Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('application.show',compact('application'));
    }

    public function edit(Application $application)
    {
        return view('application.edit',compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $request->validate([
            //
        ]);

        $application->update($request->all());

        return redirect()->route('application.index')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('application.index')->with('success','Data berhasil dihapus.');
    }
}
