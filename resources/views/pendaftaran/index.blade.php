@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
    @include('alert.success')

    <!-- Dwonload Pdf -->
    <div class="mb-5 pt-1 flex gap-3">

        <x-search-form route="pendaftaran.index" />
        <x-pdf-button route="dwonload_pdf_pendaftaran" />

    </div>

    <!-- Tabel Post -->
<x-table tableId="postTable">
    <x-slot name="thead">
        <tr>
            <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Nama</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Alamat</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Jenis Kelamin</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tempat Lahir</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Tanggal Lahir</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">No Telpon</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Akte Kelahiran</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Ijazah</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Foto</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Action</th>


        </tr>
    </x-slot>
    <x-slot name="tbody">


        @forelse ($pendaftaran as $item)
            <tr>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $loop->iteration }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->nama_lengkap }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->alamat }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->jenis_kelamin }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->tempat_lahir }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->tanggal_lahir }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->no_telp }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <a href="{{ asset($item->akte) }}" target="_blank"  style="color: blue; text-decoration: underline;">Lihat PDF</a>
                </td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <a href="{{ asset($item->ijazah) }}" target="_blank"  style="color: blue; text-decoration: underline;">Lihat PDF</a>
                </td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <img src="{{ asset($item->foto) }}" alt="{{ $item->nama_lengkap }}" class="w-10 h-10 object-cover">
                </td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">

                     <x-button-show :route="'pendaftaran.show'" :id="$item->id" :param="'pendaftaran'"   />

                    </td>

            </tr>

        @empty
            <tr>
                <td colspan="11" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
            </tr>
        @endforelse
    </x-slot>
</x-table>




@endsection



@push('scripts')


@endpush

