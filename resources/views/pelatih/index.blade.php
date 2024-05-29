@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')

<div class="pb-3 flex gap-3 ">
    <x-button-add route="pelatih.create" label="Tambah"  />
    <x-pdf-button route="dwonload_pdf_pelatih" />

</div>

@include('alert.success')

<x-search-form route="pelatih.index" />

<x-table tableId="pelatihTable">
    <x-slot name="thead">
        <tr>
            <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Nama</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Alamat</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Jenis Kelamin</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tempat Lahir</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal Lahir</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">No. Telp</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Foto</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Aksi</th>
        </tr>
    </x-slot>
    <x-slot name="tbody">
        @php
            $pageNumber = $pelatih->currentPage();
            $perPage = $pelatih->perPage();
        @endphp

        @forelse ($pelatih as $p)
            <tr>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ ($pageNumber - 1) * $perPage + $loop->iteration }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->nama_lengkap }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->alamat }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->jenis_kelamin }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->tempat_lahir }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->tanggal_lahir }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->no_telp }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <img src="{{ asset('pelatih/' . $p->foto) }}" alt="{{ $p->nama }}" class="w-10 h-10 object-cover">
                </td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">
                <x-button-edit :route="'pelatih.edit'" :id="$p->id" :param="'pelatih'"  />
                 <x-button-show :route="'pelatih.show'" :id="$p->id" :param="'pelatih'"   />
                <x-button-delete :route="route('pelatih.destroy', ['pelatih' => $p->id])" :id="$p->id" />
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
            </tr>
        @endforelse
    </x-slot>
</x-table>

    {{ $pelatih->links() }}
@endsection


