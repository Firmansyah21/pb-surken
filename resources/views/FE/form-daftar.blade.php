@extends('layouts.main')
@section('content')

@include('alert.success')

   <section class="container pt-6 md:pt-10 pb-12">

    <div class="xl:mx-[200px] lg:mx-[100px] md:mx-14 mx-0 bg-white shadow-xl rounded-md">
        <div class="bg-primary text-white text-center py-3">
            <h1 class="text-2xl font-bold">Form Pendaftaran</h1>
        </div>

        <div class="px-5 lg:px-14 py-[50px]">
            <form action="{{route('form-pendaftaran-store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input id="nama_lengkap" name="nama_lengkap" type="text" required class="form-input mt-1 block w-full rounded-md">
                </div>
                <div class="mb-2">
                    <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat Lengkap</label>
                    <input id="alamat" name="alamat" type="text" required class="form-input mt-1 block w-full rounded-md">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('jenis_kelamin') border-red-500 @enderror" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="" disabled selected>Pilih Salah Satu</option>
                        <option value="Laki-laki" {{old('jenis_kelamin') == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                        <option value="Perempuan" {{old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="tempat_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir</label>
                    <input id="tempat_lahir" name="tempat_lahir" type="text" required class="form-input mt-1 block w-full rounded-md">
                </div>
                <div class="mb-2">
                    <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="form-input mt-1 block w-full rounded-md">
                </div>
                <div class="mb-2">
                    <label for="no_telp" class="block text-gray-700 text-sm font-bold mb-2">No Hp</label>
                    <input id="no_telp" name="no_telp" type="text" required class="form-input mt-1 block w-full rounded-md">
                </div>
                <div class="mb-2">
                    <label for="akte" class="block text-gray-700 text-sm font-bold mb-2">Akte Kelahiran</label>
                    <input type="file" id="akte" name="akte" required class="form-input mt-1 block w-full rounded-md">
                </div>
                <div class="mb-2">
                    <label for="ijazah" class="block text-gray-700 text-sm font-bold mb-2">Ijazah</label>
                    <input type="file" id="ijazah" name="ijazah" required class="form-input mt-1 block w-full rounded-md">
                </div>
                <div class="mb-2">
                    <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Foto Diri</label>
                    <input type="file" id="foto" name="foto" required class="form-input mt-1 block w-full rounded-md">
                </div>

                <button type="submit" class="w-full text-white py-3 bg-primary rounded-md mt-3">
                    Kirim
                </button>
            </form>


        </div>

    </div>

   </section>
@endsection
