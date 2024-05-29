@extends('layouts.admin')
@section('container')

@include('alert.success')

<section>

    <div class="bg-gray-100">
        <div class=" py-8">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 px-4">
                <div class="col-span-0 lg:col-span-2">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img src="{{ Auth::user()->anggota->foto ? asset('anggota/' . Auth::user()->anggota->foto) : asset('gambar-anggota/default.jpg') }}" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0 object-cover object-center">

                            <h1 class="text-xl font-bold">{{ Auth::user()->name }}</h1>
                            <p class="text-gray-700">{{$anggota->hasil_klasifikasi ?? ''}}</p>

                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Data Diri</span>
                            <ul>
                                <li class="mb-2"><i class="fas fa-user mr-2"></i> {{ Auth::user()->anggota->nama_lengkap }}</li>
                                <li class="mb-2"><i class="fas fa-venus-mars mr-2"></i> {{ Auth::user()->anggota->jenis_kelamin }}</li>
                                <li class="mb-2"><i class="fas fa-birthday-cake mr-2"></i> {{ Auth::user()->anggota->tempat_lahir }}</li>
                                <li class="mb-2"><i class="fas fa-calendar-day mr-2"></i> {{ Auth::user()->anggota->tanggal_lahir }}</li>
                                <li class="mb-2"><i class="fas fa-envelope mr-2"></i> {{ Auth::user()->email }}</li>
                                <li class="mb-2"><i class="fas fa-phone mr-2"></i> {{ Auth::user()->anggota->no_telp }}</li>
                                <li class="mb-2"><i class="fas fa-home mr-2"></i> {{ Auth::user()->anggota->alamat }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-3 col-span-0 ">
                    <div class="bg-white shadow rounded-lg p-6">

                        <form action="{{ route('profile.update', $anggota) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-input type="text" label="Id Anggota" name="id_anggota" id="id_anggota"  :value="$anggota->id_anggota" disabled="true" />
                            <x-input type="text" label="Nama Depan" name="first_name" id="first_name"  :value="$anggota->first_name" />
                             <x-input type="text" label="Nama Belakang" name="last_name" id="last_name"  :value="$anggota->last_name" />
                                <x-input label="Tempat Lahir" type="text" id="tempat_lahir" name="tempat_lahir"  :value="$anggota->tempat_lahir" />
                                    <x-input label="Tanggal Lahir" type="date" id="tanggal_lahir" name="tanggal_lahir"  :value="$anggota->tanggal_lahir" />
                              <div class="mb-2">
                                <label class="block text-gray-700 text-sm  mb-2">Jenis Kelamin</label>
                                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('jenis_kelamin') border-red-500 @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="Laki-laki" {{ $anggota->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $anggota->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                              </div>

                                <x-textarea id="alamat" name="alamat" rows="3" label="Alamat" :value="$anggota->alamat" />
                                    <x-input label="No Hp" type="text" id="no_telp" name="no_telp"  :value="$anggota->no_telp" />
                                    <x-input label="Foto" type="file" id="foto" name="foto"  :value="$anggota->foto" />

                           <div class="pt-4">
                            <button type="submit" class="bg-primary hover:bg-secondary text-xs md:text-base text-white  w-full h-10 rounded">
                                Update
                             </button>
                           </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
