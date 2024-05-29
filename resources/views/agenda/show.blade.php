@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')


<div class="w-full bg-white shadow-md ">

    <div class="px-4 min-h-[400px] md:min-h-[550px]">

        <div class="flex items-center gap-4 mb-4 pt-5 ">
            <h1 class="text-xl font-semibold">Detail Jadwal Latihan</h1>
        </div>

        <table class="table-auto w-full mt-4 text-left text-xs md:text-sm">

            <tr class="border-b">
                <td class="py-2">Id </td>
                <td class="px-2">:</td>
                <td>{{$agenda->id}}</td>
            </tr>


            <tr class="border-b">
                <td class="py-2">Title </td>
                <td class="px-2">:</td>
                <td>{{$agenda->title}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Tanggal Mulai </td>
                <td class="px-2">:</td>
                <td>{{$agenda->tanggal_mulai}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Tanggal Berakhir </td>
                <td class="px-2">:</td>
                <td>{{$agenda->tanggal_berakhir}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Jam </td>
                <td class="px-2">:</td>
                <td>{{$agenda->jam}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Lokasi </td>
                <td class="px-2">:</td>
                <td>{{$agenda->lokasi}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Keterangan </td>
                <td class="px-2">:</td>
                <td>{{$agenda->keterangan}}</td>
            </tr>


            <tr class="border-b">
                <td class="py-2"> Dibuat Pada</td>
                <td class="px-2">:</td>
                <td>{{$agenda->created_at->format('d-F-Y H:i:s')}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">DiUbah Pada </td>
                <td class="px-2">:</td>
                <td>{{$agenda->updated_at->format('d-F-Y H:i:s')}}</td>
            </tr>



        </table>



    </div>

</div>


@endsection
