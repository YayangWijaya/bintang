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

        @forelse ($candidates as $candidate)
        <div class="application">
            <div class="app-content">
                <div class="info">
                    <img src="{{ asset($candidate->photo_url) }}" alt="{{ $candidate->name }}" style="object-fit: cover;{{ $candidate->terminated ? '-webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */filter: grayscale(100%);' : '' }}">
                    <span style="{{ $candidate->terminated ? 'color: #A9B2C3;' : '' }}">{{ $candidate->name }}</span>
                    <ul>
                        <li><a href="{{ asset($candidate->cv_url) }}" target="_blank"><i class="fa fa-file-text"></i> Lihat CV</a></li>
                        <li><a href="{{ asset($candidate->document_url) }}" target="_blank"><i class="fa fa-file-text"></i> Lihat Berkas</a></li>
                        <li><a href="https://wa.me/{{ $candidate->wa }}" target="_blank"><i class="fa fa-phone"></i> WhatsApp</a></li>
                        <li><a><i class="fa fa-user"></i> {{ $candidate->age }} Tahun</a></li>
                        <li><a><i class="fa fa-user"></i> {{ $candidate->step_name }}</a></li>
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
                    <span>{{ $candidate->name }}</span>

                    <i>Nomor KTP:</i>
                    <span>{{ $candidate->ktp_number }}</span>

                    <i>Email:</i>
                    <span><a href="mailto:{{ $candidate->email }}">{{ $candidate->email }}</a></span>

                    <i>WhatsApp:</i>
                    <span><a href="https://wa.me/{{ $candidate->wa }}" target="_blank">WhatsApp</a></span>

                    <i>Tempat, Tgl Lahir:</i>
                    <span>{{ $candidate->pob }}, {{ date('d F Y', strtotime($candidate->dob)) }}</span>

                    <i>Gender:</i>
                    <span>{{ $candidate->gender }}</span>

                    <i>Agama:</i>
                    <span>{{ $candidate->religion }}</span>

                    <i>Status:</i>
                    <span>{{ $candidate->status }}</span>
                </div>

            </div>

            <div class="app-footer" style="padding: 10px 20px;display: flex;align-items: center;justify-content: space-between;">
                <div class='progressBar--outerWrap'>
                    <div class="progressBar timeline">
                        <ol>
                            <li class="{{ $candidate->step === 1 ? 'active' : ($candidate->step > 1 ? 'completed' : '') }}">
                                <span>Psikotest</span>
                            </li>
                            <li class="{{ $candidate->step === 2 ? 'active' : ($candidate->step > 2 ? 'completed' : '') }}">
                                <span>Fisik</span>
                            </li>
                            <li class="{{ $candidate->step === 3 ? 'active' : ($candidate->step > 3 ? 'completed' : '') }}">
                                <span>Kesehatan</span>
                            </li>
                            <li class="{{ $candidate->step === 4 ? 'active' : ($candidate->step > 4 ? 'completed' : '') }}">
                                <span>HRD</span>
                            </li>
                            <li class="{{ $candidate->step === 5 ? 'active' : ($candidate->step > 5 ? 'completed' : '') }}">
                                <span>TTD Kontrak</span>
                            </li>
                        </ol>
                    </div>
                </div>

                <div>
                    <ul>
                        @if ($candidate->step < 4)
                            @if ($candidate->terminated)
                            <a class="button" style="background-color: #282828;">TIDAK LOLOS</a>
                            @endif
                        @endif
                        @if ($candidate->step < 5 && !$candidate->terminated)
                          @if ($candidate->step === 1 && auth()->user()->role_name === 'Admin Psikotest')
                          <a href="{{ route('terminateCandidate', ['candidate' => $candidate->id]) }}" class="button">TIDAK LOLOS</a>
                          <a href="{{ route('processCandidate', ['candidate' => $candidate->id]) }}" class="button" style="background-color: #92C71F;">LOLOS PSIKOTEST</a>
                          @elseif (auth()->user()->role_name === 'Admin Psikotest')
                          <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                          @endif

                          @if ($candidate->step === 2 && auth()->user()->role_name === 'Admin Fisik')
                          <a href="{{ route('terminateCandidate', ['candidate' => $candidate->id]) }}" class="button">TIDAK LOLOS</a>
                          <a href="{{ route('processCandidate', ['candidate' => $candidate->id]) }}" class="button" style="background-color: #92C71F;">LOLOS FISIK</a>
                          @elseif (auth()->user()->role_name === 'Admin Fisik')
                          <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                          @endif

                          @if ($candidate->step === 3 && auth()->user()->role_name === 'Admin Kesehatan')
                          <a href="{{ route('terminateCandidate', ['candidate' => $candidate->id]) }}" class="button">TIDAK LOLOS</a>
                          <a href="{{ route('processCandidate', ['candidate' => $candidate->id]) }}" class="button" style="background-color: #92C71F;">LOLOS KESEHATAN</a>
                          @elseif (auth()->user()->role_name === 'Admin Kesehatan')
                          <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                          @endif

                          @if ($candidate->step === 4 && auth()->user()->role_name === 'HRD')
                          <a href="{{ route('terminateCandidate', ['candidate' => $candidate->id]) }}" class="button">TIDAK LOLOS</a>
                          <a href="{{ route('processCandidate', ['candidate' => $candidate->id]) }}" class="button" style="background-color: #92C71F;">LOLOS WAWANCARA</a>
                          @elseif (auth()->user()->role_name === 'HRD')
                          <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                          @endif
                        @else
                          @if (!$candidate->terminated)
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
