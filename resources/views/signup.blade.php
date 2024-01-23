@extends('layouts.default')

@section('content')
<div class="my-account" style="margin-top: 50px;">
    <form class="login" action="{{ route('signup') }}" method="POST" enctype="multipart/form-data" style="margin-bottom: 50px;">
        <h2>Form Pendaftaran</h2>
        @csrf

        <p class="form-row form-row-wide">
            <label for="name">Nama Lengkap:
                <i class="ln ln-icon-Male"></i>
                <input type="text" placeholder="Nama Lengkap" name="name" id="name" required/>
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="ktp_number">Nomor KTP:
                <i class="ln ln-icon-Identification-Badge"></i>
                <input type="number" placeholder="Nomor KTP" name="ktp_number" id="ktp_number" required/>
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="email">Email:
                <i class="ln ln-icon-Email"></i>
                <input type="email" placeholder="Email" name="email" id="email" required/>
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="password">Password:
                <i class="ln ln-icon-Password"></i>
                <input type="password" placeholder="Email" name="password" id="password" required/>
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="phone">Nomor Whatsapp:
                <i class="ln ln-icon-Phone-2"></i>
                <input type="number" placeholder="Nomor WhatsApp" name="phone" id="phone" required/>
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="phone">Tempat, Tanggal Lahir:
                <div style="display: flex;align-items: center;">
                    <div style="width: 50%;">
                        <input type="text" placeholder="Tempat, Tgl Lahir" name="pob" id="pob" required/>
                    </div>
                    <div style="width: 50%;">
                        <input type="date" placeholder="Tanggal Lahir" name="dob" id="dob" required/>
                    </div>
                </div>
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="phone">Gender:
                <select data-placeholder="Pilih Gender" class="chosen-select-no-single" name="gender" id="gender" required>
                    <option value="" selected disabled></option>
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="phone">Agama:
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
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="phone">Status:
                <select data-placeholder="Pilih Status" class="chosen-select-no-single" name="status" id="status" required>
                    <option value="" selected disabled></option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Cerai">Cerai</option>
                </select>
            </label>
        </p>

        <div class="upload-info"><strong>Upload CV  (PDF)</strong> <span>Max. file size: 5MB</span></div>
        <input type="file" accept=".pdf" name="cv" id="cv" required/>

        <div class="upload-info"><strong>Upload Berkas (RAR/ZIP/PDF)</strong> <span>Max. file size: 5MB</span></div>
        <input type="file" accept=".pdf" name="document" id="document" required/>

        <div class="upload-info"><strong>Upload Pas Foto </strong> <span>Max. file size: 5MB</span></div>
        <input type="file" accept=".jpg,.jpeg,.png" name="photo" id="photo" required/>
        <br>

        <button type="submit" class="send" style="margin-top: 25px !important;width: 100%;">Kirim Lamaran</button>
    </form>
</div>
@endsection
