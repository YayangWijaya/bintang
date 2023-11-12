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


				<a href="#small-dialog" class="popup-with-zoom-anim button">Lamar Pekerjaan Ini</a>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Lamar Pekerjaan Ini</h2>
					</div>

					<div class="small-dialog-content">
						<form action="{{ route('loker.apply', ['job' => $job->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
							<input type="text" placeholder="Nama Lengkap" name="name" id="name" required/>
							<input type="number" placeholder="Nomor KTP" name="ktp_number" id="ktp_number" required/>
							<input type="text" placeholder="Email" name="email" id="email" required/>
							<input type="number" placeholder="Nomor WhatsApp" name="phone" id="phone" required/>

                            <div style="display: flex;align-items: center;">
                                <div style="width: 50%;">
                                    <input type="text" placeholder="Tempat, Tgl Lahir" name="pob" id="pob" required/>
                                </div>
                                <div style="width: 50%;">
                                    <input type="date" placeholder="Tanggal Lahir" name="dob" id="dob" required/>
                                </div>
                            </div>

                            <div style="margin-bottom: 14px;">
                                <select data-placeholder="Pilih Gender" class="chosen-select-no-single" name="gender" id="gender" required>
                                    <option value="" selected disabled></option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div style="margin-bottom: 14px;">
                                <select data-placeholder="Pilih Agama" class="chosen-select-no-single" name="religion" id="religion" required>
                                    <option value="" selected disabled></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Kristen Advent">Kristen Advent</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>

                            <div style="margin-bottom: 14px;">
                                <select data-placeholder="Pilih Status" class="chosen-select-no-single" name="status" id="status" required>
                                    <option value="" selected disabled></option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Cerai">Cerai</option>
                                </select>
                            </div>

							<div class="upload-info"><strong>Upload CV  (PDF)</strong> <span>Max. file size: 5MB</span></div>
                            <input type="file" accept=".pdf" name="cv" id="cv" required/>

                            <div class="upload-info"><strong>Upload Pas Foto </strong> <span>Max. file size: 5MB</span></div>
                            <input type="file" accept=".jpg,.jpeg,.png" name="photo" id="photo" required/>

							<button type="submit" class="send" style="margin-top: 15px !important;">Kirim Lamaran</button>
						</form>
					</div>

				</div>

			</div>

		</div>

	</div>
	<!-- Widgets / End -->


</div>
@endsection
