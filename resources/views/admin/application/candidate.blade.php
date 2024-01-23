@extends('layouts.admin')

@section('content')
<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2>Status Lowongan</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row">
        @forelse ($applications as $app)
        <div class="col-12 col-lg-4">
            <div class="application">
                <div class="app-content">
                    <div class="info">
                        <span style="margin-top: 0;font-size: 20px;color: #E12A2A;"><u>{{ $app->job->name }}</u></span>
                        <span style="margin-top: 0;font-size: 16px;color: black;">{{ $app->job->location }}</span>
                        <p style="margin-top: 0;font-size: 16px;color: black;">Status: {{ $app->step_name }}</p>
                        <span style="margin-top: 0;font-size: 12px;color: black;">Dilamar pada {{ date('d F Y', strtotime($app->created_at)) }}</span>
                    </div>
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
</div>
@endsection
