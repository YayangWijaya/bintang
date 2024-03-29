@extends('layouts.admin')

@section('content')
<div style="display: flex;justify-content:space-between;align-items:center;">
    <div>
        <h1>Data Loker</h1>
    </div>

    <div>
        @if (auth()->user()->role_name === "HRD")
        <a href="{{ route('job.create') }}" class="button" type="button">Tambah Loker</a>
        @endif
    </div>
</div>

<div class="dashboard-list-box margin-top-30">
    <div class="dashboard-list-box-content">

        <!-- Table -->

        <table class="manage-table responsive-table">

            <tr>
                <th><i class="fa fa-file-text"></i> Judul</th>
                <th><i class="fa fa-calendar"></i> Tanggal Posting</th>
                <th><i class="fa fa-calendar"></i> Tanggal Expired</th>
                <th><i class="fa fa-user"></i> Pelamar</th>
                @if (auth()->user()->role_name === "HRD")
                <th>Aksi</th>
                @endif
            </tr>

            @forelse ($jobs as $job)
            <tr>
                <td class="title">
                    <a href="{{ route('job.show', ['job' => $job->id]) }}">{{ $job->name }}</a>
                </td>
                <td class="centered">{{ date('d F Y', strtotime($job->created_at)) }}</td>
                <td class="centered">{{ $job->expire ? date('d F Y', strtotime($job->expire)) : '-' }}</td>
                <td class="centered title">
                    <a href="{{ route('job.show', ['job' => $job->id]) }}">{{ $job->applications_count }}</a>
                </td>
                @if (auth()->user()->role_name === "HRD")
                <td class="action">
                    <span style="cursor: pointer;" onclick="deleteJob({{ $job->id }})" class="delete"><i class="fa fa-remove"></i> Delete</span>
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="5">No Data</td>
            </tr>
            @endforelse
        </table>

    </div>

    <div class="col-md-12">
        <div class="copyrights">© {{ date('Y') }} PT Century Batteries Indonesia. All Rights Reserved.</div>
    </div>
</div>
@foreach ($jobs as $index => $job)
<form action="{{ route('job.destroy', $job->id) }}" method="POST" id="delete-{{ $job->id }}">
    @csrf
    @method('DELETE')
  </form>
@endforeach
@endsection

@push('scripts')
<script>
  function deleteJob(id) {
    Swal.fire({
      title: 'Hapus Loker?',
      text: "Menghapus data tidak dapat dikembalikan!",
      icon: 'question',
      confirmButtonColor: '#198754',
      cancelButtonColor: '#E12A2A',
      showCancelButton: true,
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        $("#delete-" + id).submit();
      }
    })
  }
</script>
@endpush
