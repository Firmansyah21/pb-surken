@extends('layouts.admin')

@section('container')



<div class="flex items-center gap-4 mb-4 ">
    <h1 class="text-2xl font-semibold">Detail Prestasi</h1>
</div>

<table class="table-auto w-full mt-4 text-left">
    <tr class="border-b">
        <td class="py-2">Nama Prestasi
        </td>
        <td class="px-2">:</td>
        <td>{{$prestasi->title}}</td>
    </tr>
    <tr class="border-b">
        <td class="py-2">Deskripsi Prestasi </td>
        <td class="px-2">:</td>
        <td>{{$prestasi->deskripsi}}</td>
    </tr>
    <tr class="border-b">
        <td class="py-2">Tanggal
        </td>
        <td class="px-2">:</td>
        <td>{{$prestasi->tanggal}}</td>
    </tr>
    <tr class="border-b">
        <td class="py-2">Penyelenggara
        </td>
        <td class="px-2">:</td>
        <td>{{$prestasi->penyelenggara}}</td>
    </tr>
    <tr class="border-b">
        <td class="py-2">Lokasi
        </td>
        <td class="px-2">:</td>
        <td>{{$prestasi->lokasi}}</td>
    </tr>
    <tr class="border-b">
        <td class="py-2">Juara
        </td>
        <td class="px-2">:</td>
        <td>{{$prestasi->juara}}</td>
    </tr>
    <tr class="border-b">
        <td class="py-2">Tingkat
        </td>
        <td class="px-2">:</td>
        <td>{{$prestasi->tingkat}}</td>
    </tr>
    <tr class="border-b">
        <td class="py-2">Kategori
        </td>
        <td class="px-2">:</td>
        <td>{{$prestasi->kategori->name}}</td>
    </tr>
    <tr class="border-b">
        <td class="py-2">Anggota
        </td>
        <td class="px-2">:</td>
        <td>{{$prestasi->anggota->nama_lengkap}}</td>
    </tr>
    <tr class="border-b">
        <td class="py-2">Gambar
        </td>
        <td class="px-2">:</td>
        <td><img src="{{asset('gambar-prestasi/'.$prestasi->image)}}" alt="" class="w-32 h-32"></td>
    </tr>


</table>



@endsection
