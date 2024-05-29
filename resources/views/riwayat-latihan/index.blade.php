@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')


@include('layouts.card-riwayat-latihan')


<div class="pb-3 flex gap-3 ">
    {{-- <x-button-add route="prestasi.create" label="Tambah"  /> --}}
    <x-pdf-button route="dwonload_pdf_anggota" />

    <x-search-form route="riwayat-latihan.index" />

</div>


@include('alert.success')

    <!-- Table Prestasi -->
    <x-table tableId="riwayatTable">
        <x-slot name="thead">
            <tr>
                <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Lokasi</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Durasi</th>
                {{-- <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Keterangan</th> --}}
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Anggota</th>

            </tr>
        </x-slot>
        <x-slot name="tbody">
            @php
                $pageNumber = $riwayat->currentPage();
                $perPage = $riwayat->perPage();
            @endphp

            @forelse ($riwayat as $p)
            @if(auth()->user() && $p->user_id == auth()->user()->id)
                <tr>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{  ($pageNumber - 1) * $perPage + $loop->iteration }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->lokasi }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->tanggal }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->durasi_latihan }}</td>
                    {{-- <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->keterangan }}</td> --}}
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->anggota_id }}</td>


                </tr>
                @endif
            @empty
                <tr>
                    <td colspan="5" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
                </tr>
            @endforelse

        </x-slot>
    </x-table>

    <div class="mt-5">
        {{ $riwayat->links() }}
    </div>

@endsection
