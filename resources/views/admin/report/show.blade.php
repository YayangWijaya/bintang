@extends('layouts.admin')

@section('content')
<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2>Laporan Periode <strong>{{ date('F Y', strtotime($report->date)) }}</strong></h2>
        </div>
    </div>
</div>

<div class="row bg-white p-5 rounded-xl">
    <form method="POST" action="{{ route('report.updateReport', ['report' => $report->id]) }}">
        @csrf
        <input type="hidden" name="type" value="{{ auth()->user()->role_name }}">
        <div class="col-md-12 grid grid-cols-1 md:grid-cols-4 mb-10">
            <div class="p-5">
                <div class="text-center">
                    <p class="mb-10 font-bold">Tahap Psikotest</p>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "Admin Psikotest" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="candidates" id="candidates" {{ auth()->user()->role_name === 'Admin Psikotest' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'Admin Psikotest')) ? $report->items->where('type', 'Admin Psikotest')[0]['candidates'] : '' }}"/>
                    </div>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat Hadir</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "Admin Psikotest" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="presence" id="presence" {{ auth()->user()->role_name === 'Admin Psikotest' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'Admin Psikotest')) ? $report->items->where('type', 'Admin Psikotest')[0]['presence'] : '' }}"/>
                    </div>

                    <div class="mb-3 text-left">
                        <label>Jumlah Kandidat Lolos</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "Admin Psikotest" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="pass" id="pass" {{ auth()->user()->role_name === 'Admin Psikotest' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'Admin Psikotest')) ? $report->items->where('type', 'Admin Psikotest')[0]['pass'] : '' }}"/>
                    </div>
                </div>
            </div>

            <div class="p-5">
                <div class="text-center">
                    <p class="mb-10 font-bold">Tahap Fisik</p>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "Admin Fisik" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="candidates" id="candidates" {{ auth()->user()->role_name === 'Admin Fisik' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'Admin Fisik')) ? $report->items->where('type', 'Admin Fisik')[1]['candidates'] : '' }}"/>
                    </div>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat Hadir</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "Admin Fisik" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="presence" id="presence" {{ auth()->user()->role_name === 'Admin Fisik' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'Admin Fisik')) ? $report->items->where('type', 'Admin Fisik')[1]['presence'] : '' }}"/>
                    </div>

                    <div class="mb-3 text-left">
                        <label>Jumlah Kandidat Lolos</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "Admin Fisik" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="pass" id="pass" {{ auth()->user()->role_name === 'Admin Fisik' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'Admin Fisik')) ? $report->items->where('type', 'Admin Fisik')[1]['pass'] : '' }}"/>
                    </div>
                </div>
            </div>

            <div class="p-5">
                <div class="text-center">
                    <p class="mb-10 font-bold">Tahap Kesehatan</p>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "Admin Kesehatan" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="candidates" id="candidates" {{ auth()->user()->role_name === 'Admin Kesehatan' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'Admin Kesehatan')) ? $report->items->where('type', 'Admin Kesehatan')[2]['candidates'] : '' }}"/>
                    </div>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat Hadir</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "Admin Kesehatan" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="presence" id="presence" {{ auth()->user()->role_name === 'Admin Kesehatan' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'Admin Kesehatan')) ? $report->items->where('type', 'Admin Kesehatan')[2]['presence'] : '' }}"/>
                    </div>

                    <div class="mb-3 text-left">
                        <label>Jumlah Kandidat Lolos</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "Admin Kesehatan" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="pass" id="pass" {{ auth()->user()->role_name === 'Admin Kesehatan' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'Admin Kesehatan')) ? $report->items->where('type', 'Admin Kesehatan')[2]['pass'] : '' }}"/>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 rounded-xl p-5">
                <div class="text-center">
                    <p class="mb-10 font-bold">Tahap Wawancara HRD</p>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "HRD" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="candidates" id="candidates" {{ auth()->user()->role_name === 'HRD' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'HRD')) ? $report->items->where('type', 'HRD')[3]['candidates'] : '' }}"/>
                    </div>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat Hadir</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "HRD" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="presence" id="presence" {{ auth()->user()->role_name === 'HRD' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'HRD')) ? $report->items->where('type', 'HRD')[3]['presence'] : '' }}"/>
                    </div>

                    <div class="mb-3 text-left">
                        <label>Jumlah Kandidat Lolos</label>
                        <input class="h-8 {{ auth()->user()->role_name !== "HRD" ? '!bg-gray-100' : 'bg-white' }}" type="number" name="pass" id="pass" {{ auth()->user()->role_name === 'HRD' ? '' : 'disabled' }} value="{{ count($report->items->where('type', 'HRD')) ? $report->items->where('type', 'HRD')[3]['pass'] : '' }}"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-500 rounded-lg p-2 hover:bg-blue-400 text-white hover:text-white">Simpan</button>
        </div>
    </form>
</div>

@endsection
