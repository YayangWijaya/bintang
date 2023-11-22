@extends('layouts.admin')

@section('content')
<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2>Data Kandidat Lowongan <strong>{{ $job->name }}</strong></h2>
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

        @forelse ($job->candidates as $candidate)
        <div class="application">
            <div class="app-content">
                <div class="info">
                    <img src="{{ asset($candidate->photo_url) }}" alt="{{ $candidate->name }}" style="object-fit: cover;">
                    <span>{{ $candidate->name }}</span>
                    <ul>
                        <li><a href="{{ asset($candidate->cv_url) }}" target="_blank"><i class="fa fa-file-text"></i> Lihat CV</a></li>
                        <li><a href="https://wa.me/{{ $candidate->wa }}" target="_blank"><i class="fa fa-phone"></i> WhatsApp</a></li>
                        <li><a><i class="fa fa-user"></i> {{ $candidate->age }} Tahun</a></li>
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

            <div class="app-footer" style="padding: 10px 20px;">
                <div class="timeline" style="width: 50%;">
                    <nav>
                        <ul class="ul-time">
                          <li style="text-align: -webkit-center;">
                            <a href="#" class="active"><div></div></a>
                            <span>HRD</span>
                          </li>
                          <li style="text-align: -webkit-center;">
                            <a href="#" class="{{ $candidate->step > 1 ? 'active' : '' }}"><div></div></a>
                            <span>Psikotest</span>
                          </li>
                          <li style="text-align: -webkit-center;">
                            <a href="#" class="{{ $candidate->step > 2 ? 'active' : '' }}"><div></div></a>
                            <span>Fisik</span>
                          </li>
                          <li style="text-align: -webkit-center;">
                            <a href="#" class="{{ $candidate->step > 3 ? 'active' : '' }}"><div></div></a>
                            <span>Kesehatan</span>
                          </li>
                        </ul>
                        <div class="time">
                          <span style="width: {{ $candidate->step*115 }}px;"></span>
                        </div>
                     </nav>
                </div>

                <ul>
                    @if ($candidate->step < 5)
                      @if ($candidate->step === 1 && auth()->user()->role_name === 'Admin Psikotest')
                      <a href="{{ route('processCandidate', ['candidate' => $candidate->id]) }}" class="button">LOLOS PSIKOTEST</a>
                      @elseif (auth()->user()->role_name === 'Admin Psikotest')
                      <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                      @endif

                      @if ($candidate->step === 2 && auth()->user()->role_name === 'Admin Fisik')
                      <a href="{{ route('processCandidate', ['candidate' => $candidate->id]) }}" class="button">LOLOS FISIK</a>
                      @elseif (auth()->user()->role_name === 'Admin Fisik')
                      <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                      @endif

                      @if ($candidate->step === 3 && auth()->user()->role_name === 'Admin Kesehatan')
                      <a href="{{ route('processCandidate', ['candidate' => $candidate->id]) }}" class="button">LOLOS KESEHATAN</a>
                      @elseif (auth()->user()->role_name === 'Admin Kesehatan')
                      <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                      @endif

                      @if ($candidate->step === 4 && auth()->user()->role_name === 'HRD')
                      <a href="{{ route('processCandidate', ['candidate' => $candidate->id]) }}" class="button">LOLOS HRD</a>
                      @elseif (auth()->user()->role_name === 'HRD')
                      <a href="#" class="button" style="color: #000;background-color: rgba(240, 240, 240, 1);">SEDANG PROSES</a>
                      @endif
                    @else
                      <a href="#" class="button" style="background-color: rgba(146, 199, 31, 1);">KANDIDAT LOLOS</a>
                    @endif
                </ul>
                <div class="clearfix"></div>
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
