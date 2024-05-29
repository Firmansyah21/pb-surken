

@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form action="{{route('program-latihan.store')}}" method="POST" enctype="multipart/form-data">
@csrf

<x-input name="title" id="title" label="Judul" required />
<x-input type="date" name="tanggal" id="tanggal" label="Judul" required />
<x-input type="time" name="jam" id="jam" label="Jam" required />
<x-input name="lokasi" id="lokasi" label="Lokasi" required />
<x-input name="program" id="program" label="Program" required />
<x-textarea rows="5" name="keterangan" id="keterangan" label="Keterangan" required />



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
