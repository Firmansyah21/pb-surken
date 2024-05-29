

@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form action="{{route('prestasi.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<x-input type="text" id="title" name="title" label="Nama Prestasi" required />
<x-textarea id="deskripsi" name="deskripsi" rows='4' label="Deskripsi" required />
<x-input type="date" id="tanggal" name="tanggal" label="Tanggal" required />
<x-input type="text" id="penyelenggara" name="penyelenggara" label="Penyelenggara" required />
<x-input type="text" id="lokasi" name="lokasi" label="Lokasi" required />

<label for="juara" class="block text-sm font-medium text-gray-700">
   Juara
</label>

<select id="juara" name="juara" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
    <option value="" disabled selected>Pilih Salah Satu</option>

    <option value="Juara 1">Juara 1</option>
    <option value="Juara 2">Juara 2</option>
    <option value="Juara 3">Juara 3</option>
    <!-- Anda bisa menambahkan opsi lain di sini -->
</select>

<label for="tingkat" class="block text-sm font-medium text-gray-700 mt-1">
    Tingkat
 </label>

 <select id="tingkat" name="tingkat" class="block w-full mt-1 mb-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
     <option value="" disabled selected>Pilih Salah Satu</option>

        <option value="Kecamatan">Kecamatan</option>
        <option value="Kabupaten">Kabupaten</option>
        <option value="Provinsi">Provinsi</option>
        <option value="Nasional">Nasional</option>
 </select>

<x-select :options="$kategori" name="kategori_id" id="kategori_id" label="Kategori" required />
<div class="mb-2">
    <label for="anggota_id" class="block text-sm font-medium text-gray-700">
        Anggota
    </label>

    <select name="anggota_id" id="anggota_id" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option value="" disabled selected>Pilih Salah Satu</option>
        @foreach ($anggota as $option)
            <option value="{{ $option['id'] }}">
                {{ $option['nama_lengkap'] }}
            </option>
        @endforeach
    </select>
</div>
<x-input id="image" name='image' type="file" label='Gamabr' required />

<div class="col-span-2 flex justify-between mt-6">
    <x-button-back route="jadwal-turnamen.index" />
    <x-button-submit title="Kirim" />
</div>
</form>


@endsection
