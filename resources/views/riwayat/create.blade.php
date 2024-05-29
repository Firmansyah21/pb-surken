@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form action="{{ route('jadwal-latihan.store') }}" method="POST" enctype="multipart/form-data" class="w-full bg-white p-6 rounded-lg">
    @csrf
    <x-input type="text" id="hari" name="hari" label="Hari "  />

    <x-input type="text" id="jam" name="jam" label="Jam"  />
    <x-input type="date" id="tanggal" name="tanggal" label="Tanggal"  />
    <x-input type="text" id="lokasi" name="lokasi" label="Lokasi"  />
{{-- <x-select :options="$pelatih" name="pelatih_id" id="pelatih_id" label="Pelatih"  />
    <x-select :options="$kategori" name="kategori_id" id="kategori_id" label="Kategori"  /> --}}
    {{-- <x-select :options="$anggota" name="anggota_id" id="anggota_id" label="Anggota"  /> --}}
    <x-input type="file" id="foto" name="foto" label="Foto"  />

    <div class="col-span-2 flex justify-between mt-6">
        <x-button-back route="jadwal-latihan.index" />
        <x-button-submit title="Kirim" />
    </div>


</form>

@endsection
