@extends('layouts.admin')

@section('content')
<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12 flex justify-between items-center">
            <div>
                <h2>Data Laporan</h2>
            </div>

            <div>
                <a href="{{ route('report.new') }}" class="bg-[#E12A2A] text-white hover:text-white hover:bg-[#e34f4f] p-2 rounded-lg">Buat Laporan</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="min-w-full text-left bg-white">
            <thead class="min-w-full text-left font-bold">
                <tr class="bg-white border-b-2 border-gray-500">
                    <th scope="col" class="px-6 py-4">Tanggal</th>
                    <th scope="col" class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reports as $report)
                    <tr class="border-b border-neutral-200 transition duration-300 ease-in-out hover:bg-neutral-100 cursor-pointer">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                            <a href="{{ route('report.show', ['report' => $report->id]) }}" class="text-blue-500 hover:text-blue-500 hover:underline cursor-pointer">{{ date('F Y', strtotime($report->date)) }}</a>
                        </td>
                        <td>
                            <a class="bg-blue-500 text-white hover:text-white hover:bg-blue-500 cursor-pointer p-2 rounded-lg" href="{{ route('exportReport', ['report' => $report->id]) }}" target="_blank">Download Laporan</a>
                        </td>
                    </tr>
                @empty
                <div style="text-align: center;">
                    <tr class="border-b border-neutral-200 transition duration-300 ease-in-out hover:bg-neutral-100 text-center">
                        <td class="whitespace-nowrap px-6 py-4 font-medium" colspan="2">Tidak ada Laporan</td>
                    </tr>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
