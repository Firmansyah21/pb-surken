@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')


<form action="{{route('prestasi.update', ['prestasi' => $prestasi->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-input type="text" id="title" name="title" label="Nama Prestasi" required :value="$prestasi->title" />
    <x-textarea id="deskripsi" name="deskripsi" rows='4' label="Deskripsi" required :value="$prestasi->deskripsi" />
    <x-input type="date" id="tanggal" name="tanggal" label="Tanggal" required :value="$prestasi->tanggal" />
    <x-input type="text" id="penyelenggara" name="penyelenggara" label="Penyelenggara" required :value="$prestasi->penyelenggara" />
    <x-input type="text" id="lokasi" name="lokasi" label="Lokasi" required :value="$prestasi->lokasi" />

    <label for="juara" class="block text-sm font-medium text-gray-700">
        Juara
    </label>

    <select id="juara" name="juara" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option value="" disabled selected>Pilih Salah Satu</option>

        <option value="Juara 1" {{ $prestasi->juara == 'Juara 1' ? 'selected' : '' }}>Juara 1</option>
        <option value="Juara 2" {{ $prestasi->juara == 'Juara 2' ? 'selected' : '' }}>Juara 2</option>
        <option value="Juara 3" {{ $prestasi->juara == 'Juara 3' ? 'selected' : '' }}>Juara 3</option>
        <!-- Anda bisa menambahkan opsi lain di sini -->
    </select>

    <label for="tingkat" class="block text-sm font-medium text-gray-700 mt-1">
        Tingkat
    </label>

    <select id="tingkat" name="tingkat" class="block w-full mt-1 mb-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option value="" disabled selected>Pilih Salah Satu</option>

        <option value="Kecamatan" {{ $prestasi->tingkat == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
        <option value="Kabupaten" {{ $prestasi->tingkat == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
        <option value="Provinsi" {{ $prestasi->tingkat == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
        <option value="Nasional" {{ $prestasi->tingkat == 'Nasional' ? 'selected' : '' }}>Nasional</option>
    </select>

    <x-select :options="$kategori" name="kategori_id" id="kategori_id" label="Kategori" required :selected="$prestasi->kategori_id" />
    <div class="mb-2">
        <label for="anggota_id" class="block text-sm font-medium text-gray-700">
            Anggota
        </label>

        <select name="anggota_id" id="anggota_id" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="" disabled selected>Pilih Salah Satu</option>
            @foreach ($anggota as $option)
                <option value="{{ $option['id'] }}" {{ $prestasi->anggota_id == $option['id'] ? 'selected' : '' }}>
                    {{ $option['nama_lengkap'] }}
                </option>
            @endforeach
        </select>
    </div>
    <x-input id="image" name='image' type="file" label='Gamabr' required />
    <div class="col-span-2 flex justify-between mt-6">
        <x-button-back route="prestasi.index" />
        <x-button-submit title="Update" />
    </div>
</form>

@endsection
