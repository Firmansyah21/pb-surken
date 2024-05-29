@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')
<div class="pb-3 flex gap-3 ">
    <x-button-add route="user.create" label="Tambah"  />
    <x-pdf-button route="dwonload_pdf_user" />

</div>

<x-search-form route="user.index" />

<x-table tableId="userTable">
    <x-slot name="thead">
        <tr>
            <th scope="col" class="px-6 py-3 tracking-wider border">No</th>
            <th scope="col" class="px-6 py-3 uppercase tracking-wider border">Nama</th>
            <th scope="col" class="px-6 py-3 uppercase tracking-wider border">Email</th>
            <th scope="col" class="px-6 py-3 uppercase tracking-wider border">Role</th>
            <th scope="col" class="px-6 py-3 uppercase tracking-wider border">Aksi</th>
        </tr>
    </x-slot>
    <x-slot name="tbody">

        @php
        $pageNumber = $user->currentPage();
        $perPage = $user->perPage();
    @endphp
        @forelse ($user as $item)
            <tr>
                <td class="px-3 text-sm py-2 whitespace-nowrap border">{{ ($pageNumber - 1) * $perPage + $loop->iteration }}</td>
                <td class="px-6 text-sm py-2 whitespace-nowrap border">{{ $item->name }}</td>
                <td class="px-6 text-sm py-2 whitespace-nowrap border">{{ $item->email }}</td>
                <td class="px-6 text-sm py-2 whitespace-nowrap border">{{ $item->getRoleNames()->implode(', ') }}</td>
                <td class="px-6 text-sm py-2 whitespace-nowrap border flex items-center gap-3">
                    <x-button-edit :route="'user.edit'" :id="$item->id" :param="'user'"  />
                    <x-button-show :route="'user.show'" :id="$item->id" :param="'user'"   />
                        <x-button-delete :route="route('user.destroy', ['user' => $item->id])" :id="$item->id" />

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="px-3 text-sm text-center py-2 whitespace-nowrap border">Tidak ada data</td>
            </tr>

        @endforelse
    </x-slot>

</x-table>

{{ $user->links() }}



@endsection

@push('scripts')



@endpush
