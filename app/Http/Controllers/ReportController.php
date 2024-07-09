<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reports = Report::when($request->keyword, function ($q) use ($request) {
                            $q->where('name', 'ILIKE', "%" . $request->keyword . "%");
                        })->orderBy('id','desc')->paginate(5);

        return view('admin.report.index', compact('reports'));
    }

    public function create()
    {
        return view('admin.report.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function updateReport(StoreReportRequest $request, Report $report)
    {
        DB::beginTransaction();

        try {
            $report->items()->updateOrCreate([
                'type' => $request->type
            ], [
                'candidates' => $request->candidates,
                'presence' => $request->presence,
                'pass' => $request->pass,
            ]);

            DB::commit();
            return redirect()->route('report.show', ['report' => $report->id])->with('success','Data Laporan berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('report.show', ['report' => $report->id])->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        $report->load(['items']);
        return view('admin.report.show',compact('report'));
    }

    public function edit(Report $report)
    {
        return view('admin.report.edit',compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        $request->validate([
            //
        ]);

        $report->update($request->all());

        return redirect()->route('report.index')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('report.index')->with('success','Data berhasil dihapus.');
    }

    public function new()
    {
        $periode = date('Y-m');
        $exists = Report::where('date', $periode)->exists();

        if (!$exists) {
            Report::create([
                'date' => $periode
            ]);

            return redirect()->route('report.index')->with('success','Laporan berhasil dibuat.');
        }

        return redirect()->route('report.index')->with('error','Laporan periode sekarang sudah dibuat.');
    }
}
