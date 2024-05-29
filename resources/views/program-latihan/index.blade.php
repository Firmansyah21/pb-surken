@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')

@if(Auth::user()->hasRole('admin'))
    <div class="pb-3 flex gap-3 ">
        <x-button-add route="program-latihan.create" label="Tambah"  />
        <x-pdf-button route="dwonload_pdf_anggota" />
    </div>
@endif

<x-search-form route="program-latihan.index" />

@include('alert.success')

    <!-- Table Prestasi -->
    <x-table tableId="postTable"  >
        <x-slot name="thead">
            <tr>
                <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Judul</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Jam</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Lokasi</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Program</th>

                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Keterangan</th>

                @role('admin')
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Anggota</th>
                @endrole
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @php
                $pageNumber = $program->currentPage();
                $perPage = $program->perPage();
                $counter = ($pageNumber - 1) * $perPage + 1;
            @endphp

            @forelse ($program as $p)
                <tr>
                    @if(auth()->user() && ($p->user_id == auth()->user()->id || auth()->user()->hasRole('admin')))
                        <td class="px-3 py-3 text-sm border">{{ $counter++ }}</td>
                        <td class="px-3 py-3 text-sm border">{{ $p->title }}</td>
                        <td class="px-3 py-3 text-sm border">{{ $p->tanggal }}</td>
                        <td class="px-3 py-3 text-sm border">{{ $p->jam }}</td>
                        <td class="px-3 py-3 text-sm border">{{ $p->lokasi }}</td>
                        <td class="px-3 py-3 text-sm border">{{ $p->program }}</td>
                        <td class="px-3 py-3 text-sm border">{{ $p->keterangan }}</td>

                        @role('admin')
                        <td class="px-3 py-3 text-sm border">{{ $p->anggota->nama_lengkap }}</td>
                        @endrole

               <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">
                   <x-button-show :route="'program-latihan.show'" :id="$p->id" :param="'program_latihan'"   />

                    @role('admin')
                    <x-button-edit :route="'program-latihan.edit'" :id="$p->id" :param="'program_latihan'" />
                    <x-button-delete :route="route('program-latihan.destroy', ['program_latihan' => $p->id])" :id="$p->id" />
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

    <div class="mt-5">
        {{ $program->links() }}
    </div>

@endsection
