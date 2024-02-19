<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Http\Requests\StoreAttachmentRequest;
use App\Http\Requests\UpdateAttachmentRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $attachment = Attachment::when($request->keyword, function ($q) use ($request) {
                            $q->where('name', 'ILIKE', "%" . $request->keyword . "%");
                        })->orderBy('id','desc')->paginate(5);

        return view('attachment.index', compact('attachment'));
    }

    public function create()
    {
        return view('attachment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttachmentRequest $request)
    {
        DB::beginTransaction();
        try {

            $file = $request->file('file');

            if ($file->getSize() > 20971520) {
                return response(['message' => 'Ukuran file melebihi batas maksimum 20MB'], 500);
            }

            $filename = uniqid().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs($request->folder . "/" . date('Y') . "/" . date('m') . "/" . date('d'), $filename, $request->disk ?: 'temp');

            $data = [
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'mime' => $file->getClientOriginalExtension(),
                'size' => $file->getSize(),
                'folder' => $request->folder,
                'disk' => $request->disk ?: 'temp',
                'url' => Storage::disk($request->disk ?: 'temp')->url($path),
                'type' => $request->type,
                'info' => $request->info,
            ];

            if ($request->store) {
                $data['attachmentable_id'] = $request->attachmentable_id;
                $data['attachmentable_type'] = $request->attachmentable_type;

                $data = Attachment::create($data);
            }

            if ($request->application_id) {
                $application = Application::find($request->application_id);
                $data['type'] = $application->step;
                $application->attachments()->create($data);
            }

            DB::commit();

            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            return response(['message' => $e->getMessage() . ":" . $e->getLine()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attachment $attachment)
    {
        return view('attachment.show',compact('attachment'));
    }

    public function edit(Attachment $attachment)
    {
        return view('attachment.edit',compact('attachment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttachmentRequest $request, Attachment $attachment)
    {
        $request->validate([
            //
        ]);

        $attachment->update($request->all());

        return redirect()->route('attachment.index')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attachment $attachment)
    {
        DB::beginTransaction();

        try {
            if (Storage::disk($attachment->disk)->exists($attachment->path)) {
                Storage::disk($attachment->disk)->delete($attachment->path);
            }

            $attachment->forceDelete();
            DB::commit();
            return ['message' => 'Attachment has been deleted.'];
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['message' => $e->getMessage() . ":" . $e->getLine()], 500);
        }
        // $attachment->delete();
        // return redirect()->route('attachment.index')->with('success','Data berhasil dihapus.');
    }

    public function download(Attachment $attachment)
    {
        return response()->download(Storage::disk('public')->path($attachment->path), $attachment->name, [], 'inline');
    }
}
