@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input type="text" id="title" name="title" label='Nama' required />
        <x-textarea id="body" name="body" rows="3" label="Konten" required />
        <x-select :options="$kategori" name="kategori_id" id="kategori_id" label="Kategori"  />
        <x-input id="image" name='image' type="file" label='Image' required />
        <x-label for="status" label="Status" />
        <select name="status" id="status" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option selected>Pilih Status</option>
            <option value="1">Publish</option>
            <option value="0">Draft</option>
        </select>
        <div class="hidden lg:block">
            <div class="flex justify-between mt-6 " >
                <x-button-back route="anggota.index" />
                <x-button-submit title="Kirim" />
            </div>
          </div>

          <div class=" mt-6 lg:hidden block">

            <button type="submit" class="bg-primary  text-white font-semibold w-full h-[46px]   rounded ">Kirim</button>
        </div>
    </form>
@endsection
