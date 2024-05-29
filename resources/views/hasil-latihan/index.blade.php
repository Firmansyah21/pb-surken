@extends('layouts.admin')

@section('container')
@include('components.breadcrumbs')

@include('alert.success')

<div class="container mx-auto px-4">
    <form action="{{ route('hasil-latihan.store') }}" method="POST" class="space-y-4">
        @csrf

        <x-input type="date" name="tanggal" id="tanggal" label="Tanggal" required />
        <x-input name="lokasi" id="lokasi" label="Lokasi" required />
        <div>
            <label for="lawan_id" class="block text-sm font-medium text-gray-700">Lawan Bertanding</label>
            <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="lawan_id" name="lawan_id" required>
                <option value="" disabled selected>Pilih Lawan</option>
                @foreach($anggota as $anggota)
                    <option value="{{ $anggota->id }}">{{ $anggota->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <x-input name="skor_anggota" id="skor_anggota" label="Skor Saya" required />
        <x-input name="skor_lawan" id="skor_lawan" label="Skor Lawan" required />

       <div class="pt-3">
        <button type="submit" class="w-full py-3  px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-primary">Kirim</button>
       </div>
    </form>


</div>

@endsection
