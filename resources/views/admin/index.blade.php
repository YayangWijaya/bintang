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
            <div class="dashboard-stat-content"><h4 class="counter">{{ $jobs }}</h4> <span>Jumlah Lowongan</span></div>
            <div class="dashboard-stat-icon"><i class="ln ln-icon-File-Link"></i></div>
        </a>
    </div>

        <!-- Item -->
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('job.index') }}" class="dashboard-stat color-2" style="color: #fff;cursor: pointer;">
            <div class="dashboard-stat-content"><h4 class="counter">{{ $jobViews }}</h4> <span>Penayangan Lowongan</span></div>
            <div class="dashboard-stat-icon"><i class="ln ln-icon-Bar-Chart"></i></div>
        </a>
    </div>


        <!-- Item -->
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('candidate.index') }}" class="dashboard-stat color-3" style="color: #fff;cursor: pointer;">
            <div class="dashboard-stat-content"><h4 class="counter">{{ $candidates }}</h4> <span>Jumlah Kandidat</span></div>
            <div class="dashboard-stat-icon"><i class="ln ln-icon-Business-ManWoman"></i></div>
        </a>
    </div>


    <!-- Item -->
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('candidate.index') }}" class="dashboard-stat color-4" style="color: #fff;cursor: pointer;">
            <div class="dashboard-stat-content"><h4 class="counter">{{ $candidatePassed }}</h4> <span>Kandidat Lolos</span></div>
            <div class="dashboard-stat-icon"><i class="ln ln-icon-Add-UserStar "></i></div>
        </a>
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
