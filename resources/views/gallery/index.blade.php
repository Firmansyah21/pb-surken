@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<div class="pb-5 flex">
    <x-button-add route="gallery.create" label="Tambah"  />
</div>

@include('alert.success')

<x-search-form route="gallery.index" />

<x-table tableId="galleryTable">
    <x-slot name="thead">
        <tr>
            <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
            <th scope="col" class="px-3 text-sm py-3 tracking-wider border">Title</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Gambar</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Aksi</th>
        </tr>
    </x-slot>
    <x-slot name="tbody">
        @php
            $pageNumber = $galeri->currentPage();
            $perPage = $galeri->perPage();
        @endphp
        @forelse ($galeri as $g)
            <tr>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ ($pageNumber - 1) * $perPage + $loop->iteration }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ Str::limit($g->title, 40) }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <img src="{{ asset('gallery/' . $g->foto) }}" alt="" class="w-10 h-10 object-cover">
                </td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">
                <x-button-edit :route="'gallery.edit'" :id="$g->id" :param="'gallery'"  />
                 <x-button-show :route="'gallery.show'" :id="$g->id" :param="'gallery'"   />
                    <x-button-delete :route="route('gallery.destroy', ['gallery' => $g->id])" :id="$g->id" />
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
            </tr>
        @endforelse



    </x-slot>

</x-table>

{{ $galeri->links() }}






@endsection
