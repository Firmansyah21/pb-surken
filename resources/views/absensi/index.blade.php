@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<div class="pb-3 flex gap-3 ">
    <x-button-add route="absensi.create" label="Tambah"  />
    <x-pdf-button route="dwonload_pdf_anggota" />

</div>

<x-search-form route="absensi.index" />

@include('alert.success')

    <!-- Table Prestasi -->
    <x-table tableId="prestasiTable">
        <x-slot name="thead">
            <tr>
                <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>

                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Jam Masuk</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Jam Keluar</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Keterangan</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Status</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Foto</th>

            </tr>
        </x-slot>
        <x-slot name="tbody">

            @php
            $pageNumber = $absensi->currentPage();
            $perPage = $absensi->perPage();

        @endphp

        @forelse ($absensi as $item)
            @if(auth()->user() && $item->user_id == auth()->user()->id)

                <tr>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{
                        ($pageNumber - 1) * $perPage + $loop->iteration
                        }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->tanggal }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->jam_masuk }}</td>

                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    {{ $item->jam_keluar }}
                    @if($item->status == 'hadir' && empty($item->jam_keluar))
                        <form id="updateForm{{ $item->id }}" action="{{ route('absensi.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @php
                                // Mengubah zona waktu menjadi Waktu Jakarta (WIB)
                                $waktu_jakarta = \Carbon\Carbon::now('Asia/Jakarta')->format('H:i:s');
                            @endphp
                            <input type="hidden" name="jam_keluar" value="{{ $waktu_jakarta }}">
                        </form>
                        <button onclick="confirmUpdate({{ $item->id }})" class="ml-2 px-2 py-1 bg-blue-500 text-white rounded">Update Jam Keluar</button>
                    @endif
                </td>

                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->keterangan ?? '-' }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">
                        <span class="
                            {{ $item->status == 'hadir' ? 'bg-green-500' : '' }}
                            {{ $item->status == 'izin' ? 'bg-yellow-500' : '' }}
                            {{ $item->status == 'sakit' ? 'bg-blue-500' : '' }}
                            {{ $item->status == 'alfa' ? 'bg-red-500' : '' }}
                            text-white px-2 rounded">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">
                        <img src="{{ asset('Absensi/' . $item->foto) }}" alt="foto" class="w-10 h-10 object-cover">
                    </td>

                </tr>

            @endif
        @empty
            <tr>
                <td colspan="8" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
            </tr>
        @endforelse


        </x-slot>


    </x-table>

    <div class="mt-3">
        {{ $absensi->links() }}
    </div>

@endsection


@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmUpdate(id) {
    Swal.fire({
        title: 'Konfirmasi Jam Keluar',
        text: "Apakah Sudah Jam Keluar? Klik Kirim untuk Update Jam Keluar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Kirim'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('updateForm' + id).submit();
        }
    })
}
</script>

@endpush
