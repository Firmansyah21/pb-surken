@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
    @include('alert.success')

    <!-- Dwonload Pdf -->
    <div class="mb-5 pt-1 flex gap-3">

        <x-pdf-button route="dwonload_pdf_pendaftaran" />
  <x-search-form route="pendaftaran.index" />

    </div>



    <!-- Tabel Post -->
<x-table tableId="postTable">
    <x-slot name="thead">
        <tr>
            <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Lokasi</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Lawan Tanding</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Skor</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Status</th>



        </tr>
    </x-slot>
    <x-slot name="tbody">

        @php
        $pageNumber = $riwayat->currentPage();
        $perPage = $riwayat->perPage();
    @endphp


        @forelse ($riwayat as $item)
            <tr>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ ($pageNumber - 1) * $perPage + $loop->iteration}}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->tanggal }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->lokasi }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->lawan}}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->skor }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <span class="{{ $item->status == 'Menang' ? 'bg-green-400' : 'bg-red-500' }} text-white px-2 rounded">
                        {{ $item->status }}
                    </span>
                </td>
            </tr>

        @empty
            <tr>
                <td colspan="11" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
            </tr>
        @endforelse
    </x-slot>
</x-table>

<div class="mt-1">
    {{ $riwayat->links() }}
</div>




@endsection



@push('scripts')


@endpush

