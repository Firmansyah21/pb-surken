
@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form action="{{route('anggota.update', $anggota->id)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-input label="Id Anggota" type="text" id="id_anggota" name="id_anggota"  :value="$anggota->id_anggota" />
        <x-input type="text" label="Nama Depan" name="first_name" id="first_name"  :value="$anggota->first_name" />
            <x-input type="text" label="Nama Belakang" name="last_name" id="last_name"  :value="$anggota->last_name" />
    <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('jenis_kelamin') border-red-500 @enderror" name="jenis_kelamin" id="jenis_kelamin">
        <option value="" disabled selected>Pilih Salah Satu</option>
        <option value="Laki-laki" {{ $anggota->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ $anggota->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>

    <x-input label="Tempat Lahir" type="text" id="tempat_lahir" name="tempat_lahir"  :value="$anggota->tempat_lahir" />
    <x-input label="Tanggal Lahir" type="date" id="tanggal_lahir" name="tanggal_lahir"  :value="$anggota->tanggal_lahir" />
        <x-textarea id="alamat" name="alamat" rows="4" label="Alamat" :value="$anggota->alamat" />
    <x-input label="No Hp" type="text" id="no_telp" name="no_telp"  :value="$anggota->no_telp" />

    <x-input id="foto" name='foto' type="file" label='Image'  />
    <label class="block text-gray-700 text-sm font-bold mb-2">Status Anggota</label>
    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('status_anggota') border-red-500 @enderror" name="status_anggota" id="status_anggota">
        <option value="" disabled selected>Pilih Salah Satu</option>
        <option value="Aktif" {{ $anggota->status_anggota == 'Aktif' ? 'selected' : '' }}>Aktif</option>
        <option value="Tidak Aktif" {{ $anggota->status_anggota == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
    </select>
    @error('status_anggota')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror


    <div class="col-span-2 flex justify-between mt-6">
        <x-button-back route="anggota.index" />
        <x-button-submit title="Update" />
    </div>
</form>

@endsection
