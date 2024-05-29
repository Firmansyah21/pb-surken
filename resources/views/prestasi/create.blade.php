

@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form action="{{route('prestasi.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<x-input type="text" id="title" name="title" label="Nama Prestasi" required />
{{-- <x-textarea id="deskripsi" name="deskripsi" rows='4' label="Deskripsi" required /> --}}
<x-input type="date" id="tanggal" name="tanggal" label="Tanggal" required />
{{-- <x-input type="text" id="penyelenggara" name="penyelenggara" label="Penyelenggara" required /> --}}
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

<x-select :options="$kategori" name="kategori_id" id="kategori_id" label="Kategori"  />


<div class="mb-2">
    <label for="anggota_id" class="block text-sm font-medium text-gray-700">
        Anggota
    </label>
    <select name="anggota_id" id="anggota_id" required onchange="fillUser()" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option value="" disabled selected>Pilih Salah Satu</option>
        @foreach($anggota as $anggotaItem)
        <option value="{{ $anggotaItem->id }}" data-user-id="{{ $anggotaItem->user_id }}">{{ $anggotaItem->nama_lengkap }}</option>
    @endforeach
    </select>
</div>
<input type="hidden" name="user_id" id="user_id">

<x-input id="image" name='image' type="file" label='Gamabr' required />

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

@push('scripts')

<script>
    function fillUser() {
        var anggotaSelect = document.getElementById("anggota_id");
        var selectedAnggotaOption = anggotaSelect.options[anggotaSelect.selectedIndex];
        var userIdInput = document.getElementById("user_id");

        // Get the user_id associated with the selected anggota
        var selectedUserId = selectedAnggotaOption.getAttribute("data-user-id");

        // Set the user_id input value to the selected user_id
        userIdInput.value = selectedUserId;
    }

    // Call fillUser initially to populate user_id based on initial anggota_id selection
    fillUser();
</script>


@endpush
