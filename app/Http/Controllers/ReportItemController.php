<?php

namespace App\Http\Controllers;

use App\Models\ReportItem;
use App\Http\Requests\StoreReportItemRequest;
use App\Http\Requests\UpdateReportItemRequest;
use Illuminate\Http\Request;

class ReportItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reportItem = ReportItem::when($request->keyword, function ($q) use ($request) {
                            $q->where('name', 'ILIKE', "%" . $request->keyword . "%");
                        })->orderBy('id','desc')->paginate(5);

        return view('reportItem.index', compact('reportItem'));
    }

    public function create()
    {
        return view('reportItem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportItemRequest $request)
    {
        $request->validate([
            //
        ]);

        ReportItem::create($request->all());

        return redirect()->route('reportItem.index')->with('success','Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReportItem $reportItem)
    {
        return view('reportItem.show',compact('reportItem'));
    }

    public function edit(ReportItem $reportItem)
    {
        return view('reportItem.edit',compact('reportItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportItemRequest $request, ReportItem $reportItem)
    {
        $request->validate([
            //
        ]);

        $reportItem->update($request->all());

        return redirect()->route('reportItem.index')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportItem $reportItem)
    {
        $reportItem->delete();
        return redirect()->route('reportItem.index')->with('success','Data berhasil dihapus.');
    }
}
