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
                        <span style="margin-top: 0;font-size: 20px;color: #E12A2A;font-weight: 800;">{{ $app->job->name }}</span>
                        <span style="margin-top: 0;font-size: 16px;color: black;">{{ $app->job->location }}</span>
                        <p style="margin-top: 0;font-size: 16px;color: black;">Status: {{ $app->step_name }}</p>
                        <span style="margin-top: 0;font-size: 12px;color: black;">Dilamar pada {{ date('d F Y', strtotime($app->created_at)) }}</span>
                    </div>

                    @if ($app->upload)
                    <a href="#small-dialog" class="popup-with-zoom-anim button blob red" style="margin-top: 10px;width: 100%;text-align: center;" onClick="openDialog('{{ $app->id }}')">Upload Bukti {{ $app->upload_title }}</a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div style="text-align: center;">
            <h1>Tidak ada Lowongan</h1>
        </div>
        @endforelse
        </div>
    </div>
</div>

<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
    <div class="small-dialog-headline">
        <h2>Upload Bukti</h2>
    </div>

    <div class="small-dialog-content">
        <form action="#" method="get" >
            <!-- Upload CV -->
            <div class="upload-info"><strong>Pilih Bukti</strong> <span>Max ukuran file: 5MB</span></div>
            <div class="clearfix"></div>

            <label class="upload-btn">
                <input type="file" id="document" accept=".jpg,.png,.pdf"/>
                <i class="fa fa-upload"></i> Pilih File
            </label>
            <span class="fake-input" id="file-name">Tidak ada file dipilih</span>

            <div class="divider"></div>

            <button class="send" id="upload">Upload Bukti</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
var applicationId = '';

$('#upload').on('click', function() {
    var fileInput = $('#document')[0];
    var file = fileInput.files[0];

    if (file) {
        var formData = new FormData();
        formData.append('file', file);
        formData.append('_token', `{{ csrf_token() }}`);
        formData.append('application_id', applicationId);
        formData.append('folder', 'application');
        formData.append('disk', 'public');

        $("#upload").html(`<i class="fa fa-cog fa-spin"></i>  Uploading...`)
        $("#upload").prop("disabled", true)

        $.ajax({
            type: 'POST',
            url: `{{ route('attachment.store') }}`,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $("#upload").html(`Upload Bukti`)
                $("#upload").prop("disabled", false)

                Swal.fire({
                  title: 'Sukses',
                  text: 'File has been uploaded',
                  icon: 'success',
                  confirmButtonText: 'Close'
                })

                location.reload();
            },
            error: function(xhr, status, error) {
              $("#upload").html(`Upload Bukti`)
              $("#upload").prop("disabled", false)
              Swal.fire({
                title: 'Error',
                text: error,
                icon: 'error',
                confirmButtonText: 'Close'
              })
            }
        });
    } else {
      Swal.fire({
        title: 'Error',
        text: "Tidak ada file yang dipilih!",
        icon: 'error',
        confirmButtonText: 'Close'
      })
    }
});

$("#document").on("change", function() {
  let fn = $("#document").val();
  fn = fn.replace("C:\\fakepath\\", "")
  if (fn) {
    $("#file-name").html(fn)
  } else {
    $("#file-name").html("Tidak ada file dipilih")
  }
});

function openDialog(id)
{
  applicationId = id
}
</script>
@endpush

@push('style')
<style>
#small-dialog {
    margin: 120px auto !important;
}

.blob {
	background: black;
	box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
	margin: 10px;
	transform: scale(1);
	animation: pulse-black 1s infinite;
}

.blob.red {
	background: rgba(255, 82, 82, 1);
	box-shadow: 0 0 0 0 rgba(255, 82, 82, 1);
	animation: pulse-red 1s infinite;
}

@keyframes pulse-red {
	0% {
		box-shadow: 0 0 0 0 rgba(255, 82, 82, 0.7);
	}

	70% {
		box-shadow: 0 0 0 10px rgba(255, 82, 82, 0);
	}

	100% {
		box-shadow: 0 0 0 0 rgba(255, 82, 82, 0);
	}
}
</style>
@endpush
