


@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')

@role('user')

<div>
    <h1 class="md:text-2xl text-base font-bold text-center">Lengkapi Profile Terlebih Dahulu</h1>
    <hr class="mt-3 mb-8">
</div>
@endrole

<form action="{{route('anggota.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div>

            <x-input label="Id Anggota" type="text" id="id_anggota" name="id_anggota"  />
            <x-input label="Nama Depan" type="text" id="first_name" name="first_name"  />
            <x-input label="Nama Belakang" type="text" id="last_name" name="last_name"  />
            <div class="mb-2">
                <label class="block text-xs md:text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('jenis_kelamin') border-red-500 @enderror" name="jenis_kelamin" id="jenis_kelamin">
                    <option class="text-xs md:text-sm" value="" disabled selected>Pilih Salah Satu</option>
                    <option value="Laki-laki" {{old('jenis_kelamin') == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                    <option value="Perempuan" {{old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                </select>
             </div>
           <x-input label="Tempat Lahir" type="text" id="tempat_lahir" name="tempat_lahir"  />
           <x-input label="Tanggal Lahir" type="date" id="tanggal_lahir" name="tanggal_lahir"  />


        </div>
        <div>
            <x-textarea id="alamat" name="alamat" rows="3" label="Alamat"  />
            <x-input label="No Hp" type="text" id="no_telp" name="no_telp"  />

             <x-input id="foto"  name='foto' type="file" label='Foto'  />
             {{-- <label class="block text-gray-700 text-sm font-bold mb-2">Status Anggota</label> --}}
             {{-- <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('status_anggota') border-red-500 @enderror" name="status_anggota" id="status_anggota">
                 <option value="" disabled selected>Pilih Salah Satu</option>
                 <option value="Aktif" {{old('status_anggota') == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                 <option value="Tidak Aktif" {{old('status_anggota') == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
             </select>
             @error('status_anggota')
                 <p class="text-red-500 text-xs italic">{{ $message }}</p>
             @enderror --}}
        </div>

    </div>

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
