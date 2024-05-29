@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')


<div class="w-full bg-white shadow-md ">

    <div class="px-4 min-h-[400px] md:min-h-[500px]">

        <div class="flex items-center gap-4 mb-4 pt-5 ">
            <h1 class="text-xl font-semibold">Detail Pendaftaran</h1>
        </div>

        <table class="table-auto w-full mt-4 text-left text-xs md:text-sm">

          <tr>
                <td class="py-2">Id </td>
                <td class="px-2">:</td>
                <td>{{$program->id}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Judul   </td>
                <td class="px-2">:</td>
                <td>{{$program->title}}</td>
          </tr>
            <tr class="border-b">
                <td class="py-2">Tanggal</td>
                <td class="px-2">:</td>
                <td>{{$program->tanggal}}</td>
          </tr>
          <tr class="border-b">
              <td class="py-2">Jam</td>
              <td class="px-2">:</td>
              <td>{{$program->jam}}</td>
        </tr>

            <tr class="border-b">
                <td class="py-2">Lokasi</td>
                <td class="px-2">:</td>
                <td>{{$program->lokasi}}</td>
          </tr>
            <tr class="border-b">
                <td class="py-2">Program</td>
                <td class="px-2">:</td>
                <td>{{$program->program}}</td>
          </tr>
            <tr class="border-b">
                <td class="py-2">Keterangan</td>
                <td class="px-2">:</td>
                <td>{{$program->keterangan}}</td>
          </tr>
            <tr class="border-b">
                <td class="py-2">Anggota</td>
                <td class="px-2">:</td>
                <td>{{$program->anggota->nama_lengkap}}</td>
          </tr>
            <tr class="border-b">
                <td class="py-2">User</td>
                <td class="px-2">:</td>
                <td>{{$program->user->name}}</td>
          </tr>


            <tr class="border-b">
                <td class="py-2"> Dibuat Pada</td>
                <td class="px-2">:</td>
                <td>{{$program->created_at->format('d-F-Y H:i:s')}}</td>
            </tr>





        </table>



    </div>

</div>


@endsection
