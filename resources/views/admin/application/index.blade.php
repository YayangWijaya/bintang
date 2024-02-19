@extends('layouts.admin')

@section('content')
<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2>Data Kandidat</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if (session()->get('success'))
        <div style="background: rgba(40, 167, 69, .5);color: #000;padding: 10px 20px;margin-bottom: 20px;border-radius: 5px;">
            <p><h5><strong>Sukses!</strong></h5></p>
            <p>{{ session()->get('success') }}</p>
        </div>
        @endif

        @forelse ($applications as $app)
        <div class="application">
            <div class="app-content">
                <div class="info">
                    <img src="{{ asset($app->candidate->photo_url) }}" alt="{{ $app->candidate->name }}" style="object-fit: cover;{{ $app->terminated ? '-webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */filter: grayscale(100%);' : '' }}">
                    <span style="{{ $app->terminated ? 'color: #A9B2C3;' : '' }}">{{ $app->candidate->name }} - {{ $app->job->name }}</span>
                    <ul>
                        <li><a href="{{ asset($app->candidate->cv_url) }}" target="_blank"><i class="fa fa-file-text"></i> Lihat CV</a></li>
                        <li><a href="{{ asset($app->candidate->document_url) }}" target="_blank"><i class="fa fa-file-text"></i> Lihat Berkas</a></li>
                        <li><a href="https://wa.me/{{ $app->candidate->wa }}" target="_blank"><i class="fa fa-phone"></i> WhatsApp</a></li>
                        <li><a><i class="fa fa-user"></i> {{ $app->candidate->age }} Tahun</a></li>
                    </ul>
                </div>

                <div class="buttons">
                    <a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Detail Kandidat</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="app-tabs">
                <a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>

                <div class="app-tab-content"  id="three-1">
                    <i>Nama Lengkap:</i>
                    <span>{{ $app->candidate->name }}</span>

                    <i>Nomor KTP:</i>
                    <span>{{ $app->candidate->ktp_number }}</span>

                    <i>Email:</i>
                    <span><a href="mailto:{{ $app->candidate->email }}">{{ $app->candidate->email }}</a></span>

                    <i>WhatsApp:</i>
                    <span><a href="https://wa.me/{{ $app->candidate->wa }}" target="_blank">WhatsApp</a></span>

                    <i>Tempat, Tgl Lahir:</i>
                    <span>{{ $app->candidate->pob }}, {{ date('d F Y', strtotime($app->candidate->dob)) }}</span>

                    <i>Gender:</i>
                    <span>{{ $app->candidate->gender }}</span>

                    <i>Agama:</i>
                    <span>{{ $app->candidate->religion }}</span>

                    <i>Status:</i>
                    <span>{{ $app->candidate->status }}</span>

                    <i>Bukti Psikotest:</i>
                    @if ($app->psikotestDoc)
                    <span><a href="{{ $app->psikotestDoc->url }}" target="_blank">Lihat Bukti</a></span>
                    @else
                    <span>Bukti Tidak Tersedia</span>
                    @endif

                    <i>Bukti Fisik:</i>
                    @if ($app->fisikDoc)
                    <span><a href="{{ $app->fisikDoc->url }}" target="_blank">Lihat Bukti</a></span>
                    @else
                    <span>Bukti Tidak Tersedia</span>
                    @endif

                    <i>Bukti Kesehatan:</i>
                    @if ($app->kesehatanDoc)
                    <span><a href="{{ $app->kesehatanDoc->url }}" target="_blank">Lihat Bukti</a></span>
                    @else
                    <span>Bukti Tidak Tersedia</span>
                    @endif
                </div>

            </div>

            <div class="app-footer" style="padding: 10px 20px 20px 20px;display: flex;align-items: center;justify-content: space-between;">
                <div class='progressBar--outerWrap'>
                    <div class="progressBar timeline">
                        <ol>
                            <li class="{{ $app->step === 1 ? 'active' : ($app->step > 1 ? 'completed' : '') }}">
                                <span>Psikotest</span>
                            </li>
                            <li class="{{ $app->step === 2 ? 'active' : ($app->step > 2 ? 'completed' : '') }}">
                                <span>Fisik</span>
                            </li>
                            <li class="{{ $app->step === 3 ? 'active' : ($app->step > 3 ? 'completed' : '') }}">
                                <span>Kesehatan</span>
                            </li>
                            <li class="{{ $app->step === 4 ? 'active' : ($app->step > 4 ? 'completed' : '') }}">
                                <span>HRD</span>
                            </li>
                            <li class="{{ $app->step === 5 ? 'active' : ($app->step > 5 ? 'completed' : '') }}">
                                <span>TTD Kontrak</span>
                            </li>
                        </ol>
                    </div>
                </div>

                <div>
                    <ul>
                        @if ($app->step < 4)
                            @if ($app->terminated)
                            <a class="button" style="background-color: #282828;">TIDAK LOLOS</a>
                            @endif
                        @endif
                        @if ($app->step < 5 && !$app->terminated)
                          @if ($app->step === 1 && auth()->user()->role_name === 'Admin Psikotest')
                          <a href="{{ route('terminateCandidate', ['application' => $app->id]) }}" class="button">TIDAK LOLOS</a>
                          <a href="{{ route('processCandidate', ['application' => $app->id]) }}" class="button" style="background-color: #92C71F;">LOLOS PSIKOTEST</a>
                          @elseif (auth()->user()->role_name === 'Admin Psikotest')
                          <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                          @endif

                          @if ($app->step === 2 && auth()->user()->role_name === 'Admin Fisik')
                          <a href="{{ route('terminateCandidate', ['application' => $app->id]) }}" class="button">TIDAK LOLOS</a>
                          <a href="{{ route('processCandidate', ['application' => $app->id]) }}" class="button" style="background-color: #92C71F;">LOLOS FISIK</a>
                          @elseif (auth()->user()->role_name === 'Admin Fisik')
                          <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                          @endif

                          @if ($app->step === 3 && auth()->user()->role_name === 'Admin Kesehatan')
                          <a href="{{ route('terminateCandidate', ['application' => $app->id]) }}" class="button">TIDAK LOLOS</a>
                          <a href="{{ route('processCandidate', ['application' => $app->id]) }}" class="button" style="background-color: #92C71F;">LOLOS KESEHATAN</a>
                          @elseif (auth()->user()->role_name === 'Admin Kesehatan')
                          <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                          @endif

                          @if ($app->step === 4 && auth()->user()->role_name === 'HRD')
                          <a href="{{ route('terminateCandidate', ['application' => $app->id]) }}" class="button">TIDAK LOLOS</a>
                          <a href="{{ route('processCandidate', ['application' => $app->id]) }}" class="button" style="background-color: #92C71F;">LOLOS WAWANCARA</a>
                          @elseif (auth()->user()->role_name === 'HRD')
                          <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                          @endif
                        @else
                          @if (!$app->terminated)
                          <a href="#" class="button" style="background-color: rgba(146, 199, 31, 1);">KANDIDAT LOLOS</a>
                          @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @empty
        <div style="text-align: center;">
            <h1>Tidak ada Kandidat</h1>
        </div>
        @endforelse
    </div>
</div>
@endsection
