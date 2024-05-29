@extends('layouts.admin')
@include('components.breadcrumbs')
@section('container')
    <div>
        <div class="flex items-center gap-4">
            <h1 class="text-2xl font-semibold">Tambah Kategori</h1>
        </div>


        <form action="{{route('kategori.store')}}" method="post" class="space-y-4">
            @csrf
            <x-input required id="name" name="name" label="Nama Kategori" />
            <x-input required id="usia" name="usia" label="Usia" />
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
    </div>
@endsection
