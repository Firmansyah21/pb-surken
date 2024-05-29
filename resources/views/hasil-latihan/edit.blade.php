@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<div class="flex items-center gap-4 mb-4 ">
    <h1 class="text-2xl font-semibold">Edit Jadwal Latihan</h1>
</div>

<form action="{{route('jadwal-latihan.update', $jadwal->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <x-input type="text" id="hari" name="hari" label="Hari "  :value="$jadwal->hari" />
    <x-input type="text" id="jam" name="jam" label="Jam"  :value="$jadwal->jam" />
    <x-input type="date" id="tanggal" name="tanggal" label="Tanggal"  :value="$jadwal->tanggal" />
    <x-input type="text" id="lokasi" name="lokasi" label="Lokasi"  :value="$jadwal->lokasi" />

    <x-input type="file" id="foto" name="foto" label="Foto"  :value="$jadwal->foto" />

    <div class="col-span-2 flex justify-between mt-6">
        <x-button-back route="jadwal-latihan.index" />
        <x-button-submit title="Kirim" />
    </div>


</form>

@endsection
