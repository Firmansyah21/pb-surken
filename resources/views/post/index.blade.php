@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')

<!-- Add Data -->
    <div class="pb-5  flex">
        <x-button-add route="post.create" label="Tambah"  />
    </div>


    @include('alert.success')

    <x-search-form route="post.index" />


    <!-- Tabel Post -->
<x-table tableId="postTable">
    <x-slot name="thead">
        <tr>
            <th scope="col" class="px-3 text-sm py-3 tracking-wider border">No</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Judul</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Konten</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Kategori</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Status</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Thumbnail</th>
            <th scope="col" class="px-3 text-sm py-3 uppercase tracking-wider border">Aksi</th>
        </tr>
    </x-slot>
    <x-slot name="tbody">

        @php
        $pageNumber = $post->currentPage();
        $perPage = $post->perPage();
    @endphp
        @forelse ($post as $item)
            <tr>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ ($pageNumber - 1) * $perPage + $loop->iteration }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->title }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ Str::limit($item->body, 50) }}</td>

                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ $item->kategori->name ?? '' }}</td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <span class="{{ $item->status == 1 ? 'bg-green-500' : 'bg-red-500' }} text-white px-2 rounded">
                        {{ $item->status == 1 ? 'Publish' : 'Draft' }}
                    </span>
                </td>

                <td class="px-3 text-sm py-2 whitespace-nowrap border">
                    <img src="{{ asset('berita/' . $item->image) }}" alt="{{ $item->judul }}" class="w-10 h-10 object-cover">
                </td>
                <td class="px-3 text-sm py-2 whitespace-nowrap border flex items-center gap-3">
                    <a href="{{ route('detail-blog', ['slug' => $item->slug]) }}" target="_blank" class="text-blue-600 hover:text-blue-700 p-2">
                        <i class="fas fa-eye text-xl"></i>
                    </a>

                    <x-button-edit :route="'post.edit'" :param="'post'" :id="$item->id"  />
                        <x-button-delete :route="route('post.destroy', ['post' => $item->id])" :id="$item->id" />


                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
            </tr>
        @endforelse


    </x-slot>
</x-table>

{{ $post->links() }}


@endsection



@push('scripts')


@endpush

