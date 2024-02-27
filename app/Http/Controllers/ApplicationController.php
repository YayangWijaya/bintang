<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $applications = Application::when($request->keyword, function ($q) use ($request) {
                                $q->where('name', 'ILIKE', "%" . $request->keyword . "%");
                            })->orderBy('id','desc')->paginate(5);

        return view('admin.application.index', compact('applications'));
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
