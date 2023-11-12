@extends('layouts.default')

@section('content')
<div id="banner" style="background-image: url({{ asset('images/banner-home-01.jpg') }})" class="parallax background" data-img-width="2000" data-img-height="1330" data-diff="100">
	<div class="container">
		<div class="sixteen columns">

			<div class="search-container">
				<div class="announce">
                    <span>Selamat datang di <strong>CBI Career</strong></span>
                    <p style="margin-top: 15px;">PT Century Batteries Indonesia</p>
                    <div class="browse-jobs">
                        <a href="browse-categories.html">Mulai bangun mimpimu!</a>
                    </div>
                </div>
			</div>

		</div>
	</div>
</div>

<div class="container">
	<div>
        <div class="padding-right">
            <div style="text-align: center;">
                <h1 class="margin-bottom-25"><strong>Lowongan Terbaru</strong></h1>
            </div>
            <div class="listings-container" style="padding: 0 200px;">
                @forelse ($jobs as $index => $job)
                <a href="{{ route('loker', ['job' => $job->id]) }}" class="listing {{ $index%2===0 ? 'full-time' : 'part-time' }}">
                    <div class="listing-title">
                        <h4>{{ $job->name }}<span class="listing-type">{{ $job->type_name }}</span></h4>
                        <ul class="listing-icons">
                            <li><i class="fa fa-graduation-cap"></i> {{ $job->min_edu }}</li>
                            <li><i class="fa fa-map-marker"></i> {{ $job->location }}</li>
                            <li><i class="fa fa-clock-o"></i> {{ $job->expire_at }}</li>
                        </ul>
                    </div>
                </a>
                @empty
                <div style="text-align: center;">
                    <h2><strong>Belum ada Lowongan :(</strong></h2>
                </div>
                @endforelse
            </div>

            <div class="margin-bottom-55"></div>
        </div>
	</div>
</div>
@endsection
