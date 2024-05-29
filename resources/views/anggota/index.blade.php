@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')

    <div class="pb-3 flex gap-3 ">
        <x-button-add route="anggota.create" label="Tambah"  />
        <x-pdf-button route="dwonload_pdf_anggota" />

    </div>

<x-search-form route="anggota.index" />

    @include('alert.success')

    <x-table tableId="anggotaTable">
        <x-slot name="thead">
            <tr>
                <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Id Anggota </th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Nama </th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Almat </th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">JK </th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal Lahir</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Katgori </th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Foto </th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @php
                $pageNumber = $anggota->currentPage();
                $perPage = $anggota->perPage();
            @endphp


            @forelse ($anggota as $a)
                <tr>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{($pageNumber - 1) * $perPage + $loop->iteration}}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $a->id_anggota }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $a->nama_lengkap }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ Str::limit($a->alamat, 40) }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $a->jenis_kelamin }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ \Carbon\Carbon::parse($a->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $a->hasil_klasifikasi ?? '' }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">
                        <img src="{{ asset('anggota/' . $a->foto) }}" alt="{{ $a->nama_lengkap }}" class="w-10 h-10 object-cover">
                    </td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">
                    <x-button-edit :route="'anggota.edit'" :id="$a->id" :param="'anggotum'"  />
                        <x-button-show :route="'anggota.show'" :id="$a->id" :param="'anggotum'"   />
                        <x-button-delete :route="route('anggota.destroy', ['anggotum' => $a->id])" :id="$a->id" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
                </tr>
            @endforelse

        </x-slot>
    </x-table>

        {{ $anggota->links() }}


@endsection


