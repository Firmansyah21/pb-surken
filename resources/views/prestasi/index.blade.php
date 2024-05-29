@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')


<div class="pb-3 flex gap-3 ">

    @role('admin')
    <x-button-add route="prestasi.create" label="Tambah"  />
    @endrole

    <x-pdf-button route="dwonload_pdf_prestasi" />

</div>

<x-search-form route="prestasi.index" />

@include('alert.success')

    <!-- Table Prestasi -->
    <x-table tableId="prestasiTable">
        <x-slot name="thead">
            <tr>
                <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Judul</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tingkat</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Juara</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Kategori</th>

                @role('admin')
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Anggota</th>
                @endrole

                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Gambar</th>

                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @php
                $pageNumber = $prestasi->currentPage();
                $perPage = $prestasi->perPage();
            @endphp

            @forelse ( $prestasi as $p )
                @if(auth()->user() && ($p->user_id == auth()->user()->id || auth()->user()->hasRole('admin')))
                    <tr>
                        <td class="px-3 text-sm py-2 whitespace-nowrap border">{{
                            ($pageNumber - 1) * $perPage + $loop->iteration
                        }}</td>
                        <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->title }}</td>
                        <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->tanggal }}</td>
                        <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->tingkat }}</td>
                        <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->juara }}</td>
                        <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->kategori->name ?? ''}}</td>
                     @role('admin')
                     <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $p->anggota->nama_lengkap ?? '' }}</td>
                     @endrole
                        <td class="px-3 text-sm py-2 whitespace-nowrap border">
                            <img src="{{ asset('prestasi/' . $p->image) }}" alt="{{ $p->title }}" class="w-10 h-10 object-cover">
                        </td>
                        <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">
                            <x-button-show :route="'prestasi.show'" :id="$p->id" :param="'prestasi'"   />

                            @role('admin')
                            <x-button-edit :route="'prestasi.edit'" :id="$p->id" :param="'prestasi'"  />
                                <x-button-delete :route="route('prestasi.destroy', ['prestasi' => $p->id])" :id="$p->id" />
                            @endrole

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
    <div class="mt-4">
        {{ $prestasi->links() }}
    </div>

@endsection
