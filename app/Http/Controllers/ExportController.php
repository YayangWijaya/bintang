<?php

namespace App\Http\Controllers;

use Pdf;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

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
}
