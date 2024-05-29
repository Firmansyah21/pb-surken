@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')

<form action="{{ route('pelatih.update', ['pelatih' => $pelatih->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-input type="text" label="Nama Depan" name="first_name" id="first_name"  :value="$pelatih->first_name" />
    <x-input type="text" label="Nama Belakang" name="last_name" id="last_name"  :value="$pelatih->last_name" />
        <x-textarea id="alamat" name="alamat" rows="5" label="Alamat" :value="$pelatih->alamat" />
            <div class="mb-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('jenis_kelamin') border-red-500 @enderror" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="Laki-laki" {{ $pelatih->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $pelatih->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

    <x-input type="text" label="Tempat Lahir" name="tempat_lahir" id="tempat_lahir"  :value="$pelatih->tempat_lahir" />
    <x-input type="date" label="Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir"  :value="$pelatih->tanggal_lahir" />
    <x-input type="text" label="No Telp" name="no_telp" id="no_telp"  :value="$pelatih->no_telp" />
    <x-input type="file" label="Foto" name="foto" id="foto"  />

    <div class="flex justify-between mt-6">
        <x-button-back route="pelatih.index" />
        <x-button-submit title="Kirim" />
    </div>

</form>

@endsection
