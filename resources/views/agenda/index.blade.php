@extends('layouts.admin')

@section('container')

@include('components.breadcrumbs')

@role('admin')
<div class="pb-3 flex gap-3 ">
    <x-button-add route="agenda.create" label="Tambah"  />
    <x-pdf-button route="dwonload_pdf_anggota" />

</div>
@endrole

<x-search-form route="agenda.index" />

@include('alert.success')

<x-table tableId="jadwalTurnamenTable">
    <x-slot name="thead">
        <tr>
            <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Title</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal Mulai</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal Berakhir</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Jam</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Lokasi</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Keterangan</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Gambar</th>

            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Aksi</th>


        </tr>
    </x-slot>
    <x-slot name="tbody">
        @php
            $pageNumber = $agenda->currentPage();
            $perPage = $agenda->perPage();
        @endphp

        @forelse ($agenda as $item)
            <tr>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{
                    ($pageNumber - 1) * $perPage + $loop->iteration
                    }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->title }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->tanggal_mulai}}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->tanggal_berakhir }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->jam }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->lokasi }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->keterangan }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <img src="{{ asset('agenda/' . $item->foto) }}" alt="{{ $item->title }}" class="w-10 h-10 object-cover">
                </td>

        <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">

                <x-button-show :route="'agenda.show'" :id="$item->id" :param="'agenda'"   />
                @role('admin')
                <x-button-edit :route="'agenda.edit'" :id="$item->id" :param="'agenda'"  />
                <x-button-delete :route="route('agenda.destroy', ['agenda' => $item->id])" :id="$item->id" />
                 @endrole

           </td>

            </tr>

        @empty
            <tr>
                <td colspan="8" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
            </tr>
        @endforelse

    </x-slot>
</x-table>

{{ $agenda->links() }}

  @endsection
