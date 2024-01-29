@extends('layouts.default')

@section('content')
<div id="titlebar" class="photo-bg" style="background: url({{ asset('images/CBI_parallax_BG_01.jpg') }});background-position-y: -665px;background-size: cover;">
	<div class="container">
		<div class="ten columns">
			<h2>{{ $job->name }} <span class="full-time">{{ $job->type_name }}</span></h2>
		</div>

		<div class="six columns">
			<a href="#" class="button white"><i class="fa fa-star"></i> Bookmark This Job</a>
		</div>

	</div>
</div>

<div class="container">
    @if (session()->get('errors'))
    <div style="background: rgba(225, 42, 42, .5);color: #000;padding: 10px 20px;margin: 0 10px 20px 10px;border-radius: 5px;">
        <p><h5><strong>Gagal!</strong></h5></p>
        <ul>
            @foreach (json_decode(session()->get('errors')) as $index => $error)
            <li>
                <span style="margin-bottom: 10px;">
                    <p style="text-transform: capitalize;margin: 0;"><strong>{{ str_replace("_", " ", $index) }}:</strong></p>
                    @foreach ($error as $msg)
                    <p>{{ $msg }}</p>
                    @endforeach
                </span>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session()->get('error'))
    <div style="background: rgba(225, 42, 42, .5);color: #000;padding: 10px 20px;margin: 0 10px 20px 10px;border-radius: 5px;">
        <p><h5><strong>Sukses!</strong></h5></p>
        <p>{{ session()->get('error') }}</p>
    </div>
    @endif

    @if (session()->get('success'))
    <div style="background: rgba(40, 167, 69, .5);color: #000;padding: 10px 20px;margin: 0 10px 20px 10px;border-radius: 5px;">
        <p><h5><strong>Sukses!</strong></h5></p>
        <p>{{ session()->get('success') }}</p>
    </div>
    @endif

    <div class="eleven columns">
        <div class="padding-right" style="margin-bottom: 55px;">
            {!! $job->description !!}
        </div>
	</div>

	<div class="five columns">
		<div class="widget">
			<h4>Overview</h4>

			<div class="job-overview">

				<ul>
					<li>
						<i class="fa fa-map-marker"></i>
						<div>
							<strong>Lokasi:</strong>
							<span>{{ $job->location }}</span>
						</div>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Posisi:</strong>
							<span>{{ $job->name }}</span>
						</div>
					</li>
					<li>
						<i class="fa fa-clock-o"></i>
						<div>
							<strong>Jenis Pekerjaan:</strong>
							<span>{{ $job->type_name }}</span>
						</div>
					</li>
					<li>
						<i class="fa fa-money"></i>
						<div>
							<strong>Minimal Pendidikan:</strong>
							<span>{{ $job->min_edu }}</span>
						</div>
					</li>
				</ul>

                @if (!auth()->check() || (auth()->check() && auth()->user()->is_candidate))
                @if ($job->available)
                <a href="{{ route('apply', ['job' => $job->id]) }}" class="button">Lamar Pekerjaan Ini</a>
                @else
                <a style="background-color: #282828;" class="button">Loker Tidak Tersedia</a>
                @endif
                @endif
			</div>

		</div>

	</div>
	<!-- Widgets / End -->


</div>
@endsection
