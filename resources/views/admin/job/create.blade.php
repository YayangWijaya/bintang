@extends('layouts.admin')

@section('content')
<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2>Tambah Loker</h2>
        </div>
    </div>
</div>

<div class="row">

    <!-- Table-->
    <div class="col-lg-12 col-md-12">

        <div class="dashboard-list-box margin-top-0">
            <h4>Detail Loker</h4>
            <div class="dashboard-list-box-content">

            <form class="submit-page" method="POST" action="{{ route('job.store') }}">
                @csrf
                <!-- Title -->
                <div class="form">
                    <h5>Nama Loker</h5>
                    <input class="search-field" type="text" name="name" id="name" required/>
                </div>

                <!-- Job Type -->
                <div class="form">
                    <h5>Lokasi</h5>
                    <select data-placeholder="Pilih Lokasi" class="chosen-select-no-single" name="location" id="location" required>
                        <option value="" selected disabled></option>
                        <option value="Jakarta Head Office">Jakarta Head Office</option>
                        <option value="Jakarta Factory">Jakarta Factory</option>
                        <option value="Karawang Factory">Karawang Factory</option>
                    </select>
                </div>

                <!-- Job Type -->
                <div class="form">
                    <h5>Jenis Pekerjaan</h5>
                    <select data-placeholder="Pilih Jenis Pekerjaan" class="chosen-select-no-single" name="type" id="type" required>
                        <option value="" selected disabled></option>
                        <option value="1">Full-Time</option>
                        <option value="2">Part-Time</option>
                        <option value="3">Internship</option>
                        <option value="4">Freelance</option>
                    </select>
                </div>

                <div class="form">
                    <h5>Minimal Pendidikan</h5>
                    <select data-placeholder="Pilih Minimal Pendidikan" class="chosen-select-no-single" name="min_edu" id="min_edu" required>
                        <option value="" selected disabled></option>
                        <option value="SMA Sederajat">SMA Sederajat</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="form" style="width: 100%;">
                    <h5>Deskripsi</h5>
                    <textarea name="description" id="description"  required></textarea>
                </div>

                <div class="form" style="width: 100%;display:flex;justify-content:space-between;align-items:center;">
                    <div style="display: block;">
                        <small>Tgl Expire (optional)</small>
                        <input class="search-field" type="date" name="expire" id="expire"/>
                    </div>

                    <div>
                        <button type="submit" class="button" style="float: right;color: #fff;">Tambah <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
              </form>
        </div>

    </div>


    <!-- Copyrights -->
    <div class="col-md-12">
        <div class="copyrights">© {{ date('Y') }} PT Century Batteries Indonesia. All Rights Reserved.</div>
    </div>
</div>
@endsection

@push('scripts')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('#description').summernote({
    height: 200,
  });
});
</script>
@endpush
