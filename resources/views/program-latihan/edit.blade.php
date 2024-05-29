@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')

<form action="{{route('program-latihan.update', ['program_latihan' => $program->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <x-input  name="title" id='title' value="{{$program->title}}" label="Judul" />
    <x-input type="date" name="tanggal" id='tanggal' value="{{$program->tanggal}}" label="Tanggal" />
    <x-input  name="jam" id='jam' value="{{$program->jam}}" label="Jam" />
    <x-input  name="lokasi" id='lokasi' value="{{$program->lokasi}}" label="Lokasi" />
    <x-input  name="program" id='program' value="{{$program->program}}" label="Program Latihan" />
    <x-input  name="keterangan" id='keterangan' value="{{$program->keterangan}}" label="Keterangan" />

        <div class="mb-2">
            <label for="anggota_id" class="block text-sm font-medium text-gray-700">
                Anggota
            </label>
            <select name="anggota_id" id="anggota_id" required onchange="fillUser()" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="" disabled>Pilih Salah Satu</option>
                @foreach($anggota as $anggotaItem)
                    <option value="{{ $anggotaItem->id }}" data-user-id="{{ $anggotaItem->user_id }}" {{ $program->anggota_id == $anggotaItem->id ? 'selected' : '' }}>{{ $anggotaItem->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="user_id" id="user_id">

    <div class="col-span-2 flex justify-between mt-6">
        <x-button-back route="prestasi.index" />
        <x-button-submit title="Update" />
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
