@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form id="absensiForm" action="{{route('absensi.store')}}" method="POST" enctype="multipart/form-data">
@csrf

<x-input id="tanggal"  name="tanggal" label="Tanggal" type="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" />
<x-input id="jam_masuk" name="jam_masuk" label="Jam Masuk" type="text" value="{{ old('jam_masuk') }}" />
<button type="button" onclick="setJamMasuk()" class="mb-3 px-2 py-2 bg-blue-500 text-white rounded text-xs md:text-sm">Set Jam Masuk</button>

{{-- <x-input id="jam_keluar"  name="jam_keluar" label="Jam Keluar" type="text"  /> --}}

<div class="mb-2">
    <label for="status" class="block text-sm font-medium text-gray-700">
        Status
    </label>
    <select name="status" id="status"  onchange="checkStatus()"  class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option value="" disabled selected>Pilih Salah Satu</option>
        <option value="hadir">Hadir</option>
        <option value="izin">Izin</option>
        <option value="sakit">Sakit</option>
        <option value="alpa">Alfa</option>
    </select>
</div>
<div id="keterangan-field" style="display: none;">
    <x-input id="keterangan"  name="keterangan" label="Keterangan" type="text"  />
</div>
<x-input id="foto"  name="foto" label="Foto" type="file"  />

<div class="col-span-2 flex justify-between mt-6">
    <x-button-back route="absensi.index" />
    <button type="button" onclick="submitForm()" class="px-4 py-2 bg-primary text-white rounded">Kirim</button>
</div>
</form>


@endsection

@push('scripts')
<script>
    function checkStatus() {
        var status = document.getElementById("status").value;
        if (status === "izin" || status === "sakit" || status === "alpa") {
            document.getElementById("keterangan-field").style.display = "block";
        } else {
            document.getElementById("keterangan-field").style.display = "none";
        }
    }

    function setJamMasuk() {
        var waktu_jam_masuk = new Date().toLocaleTimeString('en-US', { hour12: false, timeZone: 'Asia/Jakarta' });
        document.getElementById('jam_masuk').value = waktu_jam_masuk;
        document.getElementById('tanggal').value = '{{ \Carbon\Carbon::now()->format('Y-m-d') }}'; // Mengatur tanggal menjadi tanggal sekarang
    }

    function submitForm() {
        document.getElementById("absensiForm").submit();
    }
</script>


@endpush
