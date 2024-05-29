@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')


    <div class="pb-5 flex ">
        <x-button-add route="kategori.create" label="Tambah"  />
    </div>

    <x-search-form route="kategori.index" />

    @include('alert.success')

    <x-table tableId="kategoriTable">
        <x-slot name="thead">
            <tr>
                <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Nama Kategori</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Usia</th>
                <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @php
                $pageNumber = $kategori->currentPage();
                $perPage = $kategori->perPage();
            @endphp

            @forelse ($kategori as $k)
                <tr>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ ($pageNumber - 1) * $perPage + $loop->iteration }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $k->name }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $k->usia }}</td>
                    <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">
                    <x-button-edit :route="'kategori.edit'" :id="$k->id" :param="'kategori'"  />
                     <x-button-show :route="'kategori.show'" :id="$k->id" :param="'kategori'"   />
                    <x-button-delete :route="route('kategori.destroy', ['kategori' => $k->id])" :id="$k->id" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
                </tr>
            @endforelse
        </x-slot>
    </x-table>

    {{ $kategori->links() }}

@endsection

@push('scripts')

@endpush
