<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use Pdf;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function BA(Application $application)
    {
        $users = User::whereIn('role', [0, 1, 2, 3])->get();

        $pdf = Pdf::loadView('pdf.ba', [
            'users' => $users,
            'application' => $application
        ]);

        return $pdf->download('Berita Acara ' . $application->candidate->name . '.pdf');
    }

    public function applications(Request $request)
    {
        $data = [];

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
        ->get();

        foreach ($applications as $index => $app)
        {
            $temp['No'] = $index+1;
            $temp['Lowongan'] = $app->job->name . " - " . $app->job->location;
            $temp['Tanggal Apply'] = date('d-M-Y', strtotime($app->created_at));
            $temp['Nama'] = $app->candidate->name;
            $temp['Email'] = $app->candidate->email;
            $temp['Nomor Telp'] = $app->candidate->phone;
            $temp['Tempat, Tgl Lahir'] = $app->candidate->pob . ", " . date('d-M-Y', strtotime($app->candidate->dob));
            $temp['Gender'] = $app->candidate->gender;
            $temp['Agama'] = $app->candidate->religion;
            $temp['Status'] = $app->candidate->status;
            $temp['No KTP'] = $app->candidate->ktp_number;
            $temp['Link CV'] = url($app->candidate->cv_url);
            $temp['Link Foto'] = url($app->candidate->photo_url);
            $temp['Link Dokumen'] = url($app->candidate->document_url);
            array_push($data, $temp);
        }

        if ($data) {
            return Excel::download(new DataExport($data), "Export Data Pelamar.xlsx");
        }

        return response(['message' => 'No Data to Export'], 500);
    }
}
