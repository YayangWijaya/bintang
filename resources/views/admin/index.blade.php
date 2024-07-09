@extends('layouts.admin')

@section('content')
<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
        </div>
    </div>
</div>


<!-- Content -->
<div class="row">
    <!-- Item -->
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('job.index') }}" class="dashboard-stat color-1" style="color: #fff;cursor: pointer;">
            <div class="dashboard-stat-content"><h4 class="counter">{{ $jobs }}</h4> <span>Jumlah Loker</span></div>
            <div class="dashboard-stat-icon"><i class="ln ln-icon-File-Link"></i></div>
        </a>
    </div>

        <!-- Item -->
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('job.index') }}" class="dashboard-stat color-2" style="color: #fff;cursor: pointer;">
            <div class="dashboard-stat-content"><h4 class="counter">{{ $jobViews }}</h4> <span>Penayangan Loker</span></div>
            <div class="dashboard-stat-icon"><i class="ln ln-icon-Bar-Chart"></i></div>
        </a>
    </div>


        <!-- Item -->
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('application.index') }}" class="dashboard-stat color-3" style="color: #fff;cursor: pointer;">
            <div class="dashboard-stat-content"><h4 class="counter">{{ $candidates }}</h4> <span>Jumlah Pengguna</span></div>
            <div class="dashboard-stat-icon"><i class="ln ln-icon-Business-ManWoman"></i></div>
        </a>
    </div>


    <!-- Item -->
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('application.index') }}" class="dashboard-stat color-4" style="color: #fff;cursor: pointer;">
            <div class="dashboard-stat-content"><h4 class="counter">{{ $applications->count() }}</h4> <span>Jumlah Lamaran</span></div>
            <div class="dashboard-stat-icon"><i class="ln ln-icon-Files"></i></div>
        </a>
    </div>

    <div class="col-lg-12 bg-white roundex-xl mb-5">
        <div class="px-5 pt-5">
            <p class="font-bold text-lg border-b-2 border-gray-500">Laporan Admin</p>
        </div>

        @if ($report && count($report->items))
        <div class="grid grid-cols-1 md:grid-cols-4 p-5">
            <div class="p-5">
                <div class="text-center">
                    <p class="mb-10 font-bold">Tahap Psikotest</p>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat</label>
                        <input class="h-8" type="number" name="candidates" id="candidates" readonly value="{{ count($report->items->where('type', 'Admin Psikotest')) ? $report->items->where('type', 'Admin Psikotest')[0]['candidates'] : '' }}"/>
                    </div>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat Hadir</label>
                        <input class="h-8" type="number" name="presence" id="presence" readonly value="{{ count($report->items->where('type', 'Admin Psikotest')) ? $report->items->where('type', 'Admin Psikotest')[0]['presence'] : '' }}"/>
                    </div>

                    <div class="mb-3 text-left">
                        <label>Jumlah Kandidat Lolos</label>
                        <input class="h-8" type="number" name="pass" id="pass" readonly value="{{ count($report->items->where('type', 'Admin Psikotest')) ? $report->items->where('type', 'Admin Psikotest')[0]['pass'] : '' }}"/>
                    </div>
                </div>
            </div>

            <div class="p-5">
                <div class="text-center">
                    <p class="mb-10 font-bold">Tahap Fisik</p>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat</label>
                        <input class="h-8" type="number" name="candidates" id="candidates" readonly value="{{ count($report->items->where('type', 'Admin Fisik')) ? $report->items->where('type', 'Admin Fisik')[1]['candidates'] : '' }}"/>
                    </div>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat Hadir</label>
                        <input class="h-8" type="number" name="presence" id="presence" readonly value="{{ count($report->items->where('type', 'Admin Fisik')) ? $report->items->where('type', 'Admin Fisik')[1]['presence'] : '' }}"/>
                    </div>

                    <div class="mb-3 text-left">
                        <label>Jumlah Kandidat Lolos</label>
                        <input class="h-8" type="number" name="pass" id="pass" readonly value="{{ count($report->items->where('type', 'Admin Fisik')) ? $report->items->where('type', 'Admin Fisik')[1]['pass'] : '' }}"/>
                    </div>
                </div>
            </div>

            <div class="p-5">
                <div class="text-center">
                    <p class="mb-10 font-bold">Tahap Kesehatan</p>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat</label>
                        <input class="h-8" type="number" name="candidates" id="candidates" readonly value="{{ count($report->items->where('type', 'Admin Kesehatan')) ? $report->items->where('type', 'Admin Kesehatan')[2]['candidates'] : '' }}"/>
                    </div>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat Hadir</label>
                        <input class="h-8" type="number" name="presence" id="presence" readonly value="{{ count($report->items->where('type', 'Admin Kesehatan')) ? $report->items->where('type', 'Admin Kesehatan')[2]['presence'] : '' }}"/>
                    </div>

                    <div class="mb-3 text-left">
                        <label>Jumlah Kandidat Lolos</label>
                        <input class="h-8" type="number" name="pass" id="pass" readonly value="{{ count($report->items->where('type', 'Admin Kesehatan')) ? $report->items->where('type', 'Admin Kesehatan')[2]['pass'] : '' }}"/>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 rounded-xl p-5">
                <div class="text-center">
                    <p class="mb-10 font-bold">Tahap Wawancara HRD</p>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat</label>
                        <input class="h-8" type="number" name="candidates" id="candidates" readonly value="{{ count($report->items->where('type', 'HRD')) ? $report->items->where('type', 'HRD')[3]['candidates'] : '' }}"/>
                    </div>

                    <div class="text-left mb-3">
                        <label>Jumlah Kandidat Hadir</label>
                        <input class="h-8" type="number" name="presence" id="presence" readonly value="{{ count($report->items->where('type', 'HRD')) ? $report->items->where('type', 'HRD')[3]['presence'] : '' }}"/>
                    </div>

                    <div class="mb-3 text-left">
                        <label>Jumlah Kandidat Lolos</label>
                        <input class="h-8" type="number" name="pass" id="pass" readonly value="{{ count($report->items->where('type', 'HRD')) ? $report->items->where('type', 'HRD')[3]['pass'] : '' }}"/>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="p-5 text-center">Tidak ada Laporan</div>
        @endif
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="px-5 py-3 bg-white rounded-t-lg">
            <p class="text-lg text-black font-semibold">Progress Lamaran</p>
        </div>

        <hr/>

        <div class="bg-white rounded-b-lg">
            <ul class="text-black">
                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Jumlah Lamaran</div>
                        <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-600 ring-1 ring-inset ring-blue-500/10">{{ $applications->count() }}</span>
                    </div>
                </li>

                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Tahap Psikotest</div>
                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $applications->where('step', 1)->count() }}</span>
                    </div>
                </li>

                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Tahap Fisik</div>
                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $applications->where('step', 2)->count() }}</span>
                    </div>
                </li>

                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Tahap Kesehatan</div>
                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $applications->where('step', 3)->count() }}</span>
                    </div>
                </li>

                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Tahap HRD</div>
                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $applications->where('step', 4)->count() }}</span>
                    </div>
                </li>

                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Tahap TTD Kontrak (Diterima)</div>
                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/10">{{ $applications->where('step', 5)->count() }}</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="px-5 py-3 bg-white rounded-t-lg">
            <p class="text-lg text-black font-semibold">Lamaran Di Tolak</p>
        </div>

        <hr/>

        <div class="bg-white rounded-b-lg">
            <ul class="text-black">
                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Jumlah Lamaran Ditolak</div>
                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-red-500/10">{{ $terminateds->count() }}</span>
                    </div>
                </li>

                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Tahap Psikotest</div>
                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-red-500/10">{{ $terminateds->where('step', 1)->count() }}</span>
                    </div>
                </li>

                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Tahap Fisik</div>
                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-red-500/10">{{ $terminateds->where('step', 2)->count() }}</span>
                    </div>
                </li>

                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Tahap Kesehatan</div>
                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-red-500/10">{{ $terminateds->where('step', 3)->count() }}</span>
                    </div>
                </li>

                <li class="py-2 px-4 hover:bg-[#EBEDF3]">
                    <div class="flex items-center justify-between border-2 border-black">
                        <div class="font-medium">Tahap HRD</div>
                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-red-500/10">{{ $terminateds->where('step', 4)->count() }}</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>


{{-- <div class="row">

    <!-- Recent Activity -->
    <div class="col-lg-6 col-md-12">
        <div class="dashboard-list-box margin-top-20">
            <h4>Recent Activities</h4>
            <ul>
                <li>
                    Your listing <strong><a href="#">Marketing Coordinator - SEO / SEM Experience </a></strong> has been approved!
                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                </li>

                <li>
                    Kathy Brown has sent you <strong><a href="#">private message</a></strong>!
                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                </li>

                <li>
                    Someone bookmarked your <strong><a href="#">Restaurant Team Member - Crew</a></strong>!
                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                </li>

                <li>
                    You have new application for <strong><a href="#">Power Systems User Experience Designer</a></strong>!
                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                </li>

                <li>
                    Someone bookmarked your <strong><a href="#">Core PHP Developer for Site Maintenance  </a></strong> listing!
                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                </li>
                <li>
                    Your job listing <strong><a href="#">Core PHP Developer for Site Maintenance  </a></strong> is expiring!
                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                </li>
            </ul>
        </div>
    </div>


    <!-- Recent Activity -->
    <div class="col-lg-6 col-md-12">
        <div class="dashboard-list-box with-icons margin-top-20">
            <h4>Your Packages</h4>
            <ul class="dashboard-packages">
                <li>
                    <i class="list-box-icon fa fa-shopping-cart"></i>
                    <strong>Basic</strong>
                    <span>You have 2 listings posted</span>
                </li>
                <li>
                    <i class="list-box-icon fa fa-shopping-cart"></i>
                    <strong>Extended</strong>
                    <span>You have 2 listings posted</span>
                </li>
                <li>
                    <i class="list-box-icon fa fa-shopping-cart"></i>
                    <strong>Professional</strong>
                    <span>You have 5 listings posted</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Copyrights -->
    <div class="col-md-12">
        <div class="copyrights">© {{ date('Y') }} PT Century Batteries Indonesia. All Rights Reserved.</div>
    </div>
</div> --}}
@endsection
