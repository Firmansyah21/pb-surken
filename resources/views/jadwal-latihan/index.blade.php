@extends('layouts.admin')

@section('container')
@include('components.breadcrumbs')


@role('admin')
<div class="pb-3 flex gap-3 ">
    <x-button-add route="jadwal-latihan.create" label="Tambah"  />
</div>
@endrole

<x-search-form route="jadwal-latihan.index" />

@include('alert.success')
<x-table tableId="jadwalLatihanTable">
    <x-slot name="thead">
        <tr>
            <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Hari</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Jam</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Lokasi</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Foto</th>

            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Aksi</th>

        </tr>
    </x-slot>
    <x-slot name="tbody">
        @php
            $pageNumber = $jadwal->currentPage();
            $perPage = $jadwal->perPage();
        @endphp

        @forelse ($jadwal as $jl)
            <tr>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{
                    ($pageNumber - 1) * $perPage + $loop->iteration
                     }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $jl->hari }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $jl->jam }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $jl->tanggal }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $jl->lokasi }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <img src="{{ asset('jadwal-latihan/' . $jl->foto) }}" alt="" class="w-10 h-10 object-cover">
                </td>

                <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">
                    <x-button-show :route="'jadwal-latihan.show'" :id="$jl->id" :param="'jadwal_latihan'"   />
                        @role('admin')
                    <x-button-edit :route="'jadwal-latihan.edit'" :id="$jl->id" :param="'jadwal_latihan'" />
                    <x-button-delete :route="route('jadwal-latihan.destroy', ['jadwal_latihan' => $jl->id])" :id="$jl->id" />
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

    {{ $jadwal->links() }}

@endsection
