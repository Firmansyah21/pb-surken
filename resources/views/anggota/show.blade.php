@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')


<div class="w-full bg-white shadow-md ">

    <div class="px-4 min-h-[400px] md:min-h-[550px]">

        <div class="flex items-center gap-4 mb-4 pt-5 ">
            <h1 class="text-xl font-semibold">Detail Anggota</h1>
        </div>

        <table class="table-auto w-full mt-4 text-left text-xs md:text-sm">

            <tr class="border-b">
                <td class="py-2">Id Anggota </td>
                <td class="px-2">:</td>
                <td>{{$anggota->id_anggota}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Nama Lengkap </td>
                <td class="px-2">:</td>
                <td>{{$anggota->nama_lengkap}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Alamat </td>
                <td class="px-2">:</td>
                <td>{{$anggota->alamat}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Jenis Kelamin </td>
                <td class="px-2">:</td>
                <td>{{$anggota->jenis_kelamin}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">No Telp </td>
                <td class="px-2">:</td>
                <td>{{$anggota->no_telp}}</td>

            </tr>

            <tr class="border-b">
                <td class="py-2">Tempat Lahir </td>
                <td class="px-2">:</td>
                <td>{{$anggota->tempat_lahir}}</td>

            </tr>

            <tr class="border-b">
                <td class="py-2">Tanggal Lahir </td>
                <td class="px-2">:</td>
                <td>{{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d-F-Y') }}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Kategori </td>
                <td class="px-2">:</td>
                <td>{{$anggota->hasil_klasifikasi ?? ''}}</td>

            </tr>



            <tr class="border-b">
                <td class="py-2">Status </td>
                <td class="px-2">:</td>
                <td>{{$anggota->status_anggota}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">User Anggota </td>
                <td class="px-2">:</td>
                <td>{{$anggota->user->name}}</td>
            </tr>


            <tr class="border-b">
                <td class="py-2"> Dibuat Pada</td>
                <td class="px-2">:</td>
                <td>{{$anggota->created_at->format('d-F-Y H:i:s')}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">DiUbah Pada </td>
                <td class="px-2">:</td>
                <td>{{$anggota->updated_at->format('d-F-Y H:i:s')}}</td>
            </tr>



        </table>



    </div>

</div>


@endsection
