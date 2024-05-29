@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')


<div class="w-full bg-white shadow-md ">

    <div class="px-4 min-h-[400px] md:min-h-[500px]">

        <div class="flex items-center gap-4 mb-4 pt-5 ">
            <h1 class="text-xl font-semibold">Detail Jadwal Latihan</h1>
        </div>

        <table class="table-auto w-full mt-4 text-left text-xs md:text-sm">
            <tr class="border-b">
                <td class="py-2">Id Latihan </td>
                <td class="px-2">:</td>
                <td>{{$jadwal_latihan->id}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Hari Latihan </td>
                <td class="px-2">:</td>
                <td>{{$jadwal_latihan->hari}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Jam </td>
                <td class="px-2">:</td>
                <td>{{$jadwal_latihan->jam}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Lokasi </td>
                <td class="px-2">:</td>
                <td>{{$jadwal_latihan->lokasi}}</td>

            </tr>

            <tr class="border-b">
                <td class="py-2"> Dibuat Pada</td>
                <td class="px-2">:</td>
                <td>{{$jadwal_latihan->created_at->format('d-F-Y H:i:s')}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">DiUbah Pada </td>
                <td class="px-2">:</td>
                <td>{{$jadwal_latihan->updated_at->format('d-F-Y H:i:s')}}</td>
            </tr>



        </table>



    </div>

</div>


@endsection
