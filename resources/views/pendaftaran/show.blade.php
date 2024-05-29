@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')


<div class="w-full bg-white shadow-md ">

    <div class="px-4 min-h-[400px] md:min-h-[500px]">

        <div class="flex items-center gap-4 mb-4 pt-5 ">
            <h1 class="text-xl font-semibold">Detail Pendaftaran</h1>
        </div>

        <table class="table-auto w-full mt-4 text-left text-xs md:text-sm">

            <tr class="border-b">
                <td class="py-2">Id Pendaftar </td>
                <td class="px-2">:</td>
                <td>{{$pendaftaran->id}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Nama Pendaftar </td>
                <td class="px-2">:</td>
                <td>{{$pendaftaran->nama_lengkap}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Alamat </td>
                <td class="px-2">:</td>
                <td>{{$pendaftaran->alamat}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Jenis Kelamin </td>
                <td class="px-2">:</td>
                <td>{{$pendaftaran->jenis_kelamin}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">No Hp </td>
                <td class="px-2">:</td>
                <td>{{$pendaftaran->no_telp}}</td>

            </tr>

            <tr class="border-b">
                <td class="py-2">Tempat Lahir </td>
                <td class="px-2">:</td>
                <td>{{$pendaftaran->tempat_lahir}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Tanggal Lahir </td>
                <td class="px-2">:</td>
                <td>{{\Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d M Y')}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2"> Dibuat Pada</td>
                <td class="px-2">:</td>
                <td>{{$pendaftaran->created_at->format('d-F-Y H:i:s')}}</td>
            </tr>





        </table>



    </div>

</div>


@endsection
