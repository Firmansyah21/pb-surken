@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')


<div class="w-full bg-white shadow-md ">

    <div class="px-4 min-h-[400px] md:min-h-[500px]">

        <div class="flex items-center gap-4 mb-4 pt-5 ">
            <h1 class="text-xl font-semibold">Detail Pelatih</h1>
        </div>

        <table class="table-auto w-full mt-4 text-left text-xs md:text-sm">
            <tr class="border-b">
                <td class="py-2">Id Pelatih </td>
                <td class="px-2">:</td>
                <td>{{$pelatih->id}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Nama Pelatih </td>
                <td class="px-2">:</td>
                <td>{{$pelatih->nama_lengkap}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Alamat </td>
                <td class="px-2">:</td>
                <td>{{$pelatih->alamat}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Jenis Kelamin </td>
                <td class="px-2">:</td>
                <td>{{$pelatih->jenis_kelamin}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">No Hp </td>
                <td class="px-2">:</td>
                <td>{{$pelatih->no_telp}}</td>

            </tr>

            <tr class="border-b">
                <td class="py-2">Temp Lahir </td>
                <td class="px-2">:</td>
                <td>{{$pelatih->tempat_lahir}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Tgl Lahir </td>
                <td class="px-2">:</td>
                <td>{{$pelatih->tanggal_lahir}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2"> Dibuat Pada</td>
                <td class="px-2">:</td>
                <td>{{$pelatih->created_at->format('d-F-Y H:i:s')}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">DiUbah Pada </td>
                <td class="px-2">:</td>
                <td>{{$pelatih->updated_at->format('d-F-Y H:i:s')}}</td>
            </tr>



        </table>



    </div>

</div>


@endsection
