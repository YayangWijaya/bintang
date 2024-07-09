<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>
<body>
    <div style="text-align: center;">
        <div style="position: absolute;">
            {{-- <img src="{{ asset('images/logo.png') }}"/> --}}
        </div>

        <div style="width: 100%;text-align: center;border-bottom: 2px solid #000;padding-bottom: 15px;">
            <p style="font-size: 22px;font-weight: 800;margin: 0;padding: 0;">PT CENTURY BATTERIES INDONESIA</p>
            <p style="margin: 0;padding: 0;font-size: 12px;">Produsen Baterai Otomotif</p>
            <p style="margin: 0;padding: 0;font-size: 12px;">Jl. Mitra Raya Selatan I, blok E No.17-18, Kab. Karawang</p>
            <p style="margin: 0;padding: 0;font-size: 12px;">Telp (62-21) 29488812, Fax (62-21) 29488815</p>
            <p style="margin: 0;padding: 0;font-size: 12px;">Email: contact@incoe.astra.co.id</p>
        </div>
    </div>

    <div style="width: 100%;text-align: justify;">
        <p style="font-weight: 600;font-size: 22px;text-align: center;">Laporan {{ date('F Y', strtotime($report->date)) }}</p>

        @if ($report && count($report->items))
        <table style="width: 100%;">
            <tr>
                <td style="padding-right: 50px;">
                    <p style="font-weight: 800;padding-bottom: 25px;font-size: 18px;text-transform: uppercase;">Tahap Psikotest</p>

                    <div>
                        <label>Jumlah Kandidat</label>
                        <p>{{ count($report->items->where('type', 'Admin Psikotest')) ? $report->items->where('type', 'Admin Psikotest')[0]['candidates'] : '-' }}</p>
                    </div>

                    <div>
                        <label>Jumlah Kandidat Hadir</label>
                        <p>{{ count($report->items->where('type', 'Admin Psikotest')) ? $report->items->where('type', 'Admin Psikotest')[0]['presence'] : '-' }}</p>
                    </div>

                    <div>
                        <label>Jumlah Kandidat Lolos</label>
                        <p>{{ count($report->items->where('type', 'Admin Psikotest')) ? $report->items->where('type', 'Admin Psikotest')[0]['pass'] : '-' }}</p>
                    </div>
                </td>

                <td style="padding-right: 50px;">
                    <p style="font-weight: 800;padding-bottom: 25px;font-size: 18px;text-transform: uppercase;">Tahap Fisik</p>

                    <div>
                        <label>Jumlah Kandidat</label>
                        <p>{{ count($report->items->where('type', 'Admin Fisik')) ? $report->items->where('type', 'Admin Fisik')[1]['candidates'] : '-' }}</p>
                    </div>

                    <div>
                        <label>Jumlah Kandidat Hadir</label>
                        <p>{{ count($report->items->where('type', 'Admin Fisik')) ? $report->items->where('type', 'Admin Fisik')[1]['presence'] : '-' }}</p>
                    </div>

                    <div>
                        <label>Jumlah Kandidat Lolos</label>
                        <p>{{ count($report->items->where('type', 'Admin Fisik')) ? $report->items->where('type', 'Admin Fisik')[1]['pass'] : '-' }}</p>
                    </div>
                </td>

                <td style="padding-right: 50px;">
                    <p style="font-weight: 800;padding-bottom: 25px;font-size: 18px;text-transform: uppercase;">Tahap Kesehatan</p>

                    <div>
                        <label>Jumlah Kandidat</label>
                        <p>{{ count($report->items->where('type', 'Admin Kesehatan')) ? $report->items->where('type', 'Admin Kesehatan')[2]['candidates'] : '-' }}</p>
                    </div>

                    <div>
                        <label>Jumlah Kandidat Hadir</label>
                        <p>{{ count($report->items->where('type', 'Admin Kesehatan')) ? $report->items->where('type', 'Admin Kesehatan')[2]['presence'] : '-' }}</p>
                    </div>

                    <div>
                        <label>Jumlah Kandidat Lolos</label>
                        <p>{{ count($report->items->where('type', 'Admin Kesehatan')) ? $report->items->where('type', 'Admin Kesehatan')[2]['pass'] : '-' }}</p>
                    </div>
                </td>

                <td style="padding-right: 50px;">
                    <p style="font-weight: 800;padding-bottom: 25px;font-size: 18px;text-transform: uppercase;">Tahap Wawancara HRD</p>

                    <div>
                        <label>Jumlah Kandidat</label>
                        <p>{{ count($report->items->where('type', 'HRD')) ? $report->items->where('type', 'HRD')[3]['candidates'] : '-' }}</p>
                    </div>

                    <div>
                        <label>Jumlah Kandidat Hadir</label>
                        <p>{{ count($report->items->where('type', 'HRD')) ? $report->items->where('type', 'HRD')[3]['presence'] : '-' }}</p>
                    </div>

                    <div>
                        <label>Jumlah Kandidat Lolos</label>
                        <p>{{ count($report->items->where('type', 'HRD')) ? $report->items->where('type', 'HRD')[3]['pass'] : '-' }}</p>
                    </div>
                </td>
            </tr>
        </table>
        @else
        <div class="p-5 text-center">Tidak ada Laporan</div>
        @endif
    </div>
</body>
</html>
