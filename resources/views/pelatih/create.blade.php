@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')

<form action="{{route('pelatih.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-input type="text" label="Nama Depan" name="first_name" id="first_name" required />
    <x-input type="text" label="Nama Belakang" name="last_name" id="last_name" required />
    <x-textarea id="alamat" name="alamat" rows="3" label="Alamat" required />
    <x-input type="text" label="Tempat Lahir" name="tempat_lahir" id="tempat_lahir" required />
    <x-input type="date" label="Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir" required />
 <div class="mb-2">
    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('jenis_kelamin') border-red-500 @enderror" name="jenis_kelamin" id="jenis_kelamin">
        <option value="" disabled selected>Pilih Salah Satu</option>
        <option value="Laki-laki" {{old('jenis_kelamin') == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
        <option value="Perempuan" {{old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
    </select>
 </div>
    <x-input type="text" label="No Telp" name="no_telp" id="no_telp" required />
    <x-input type="file" label="Foto" name="foto" id="foto" required />

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
