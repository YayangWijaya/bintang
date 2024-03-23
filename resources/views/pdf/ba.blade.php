<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita Acara Penerimaan Karyawan Baru</title>
</head>
<body>
    <div style="text-align: center;">
        <div style="position: absolute;">
            <img src="{{ asset('images/logo.png') }}"/>
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
        <p style="font-weight: 600;font-size: 16px;text-align: center;">BERITA ACARA PENERIMAAN KARYAWAN BARU</p>

        <p>Pada hari ini, {{ date('d F Y') }}, bertempat di kantor PT Century Batteries Indonesia, kami yang bertanda tangan di bawah ini:</p>

        <ol>
            @foreach ($users as $user)
            <li>{{ $user->name }}, selaku {{ $user->role_name }}</li>
            @endforeach
        </ol>

        <p>Telah mengadakan proses penerimaan karyawan baru untuk mengisi posisi {{ $application->job->name }} di perusahaan kami. Berikut ini adalah karyawan baru yang telah diterima:</p>

        <table style="margin-left: 18px;">
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $application->candidate->name }}</td>
                </tr>

                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>: {{ $application->candidate->pob }}, {{ date('d F Y', strtotime($application->candidate->dob)) }}</td>
                </tr>

                <tr>
                    <td>Posisi</td>
                    <td>: {{ $application->job->name }}</td>
                </tr>
            </tbody>
        </table>

        <p>Demikianlah berita acara ini dibuat dengan sebenarnya untuk menjadi bukti sah penerimaan karyawan baru di PT Century Batteries Indonesia. Semua proses penerimaan dilakukan dengan transparan dan berdasarkan prosedur yang berlaku di perusahaan kami.</p>
        <p>Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.<br>
    </div>
</body>
</html>
