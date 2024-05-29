@extends('layouts.main')
@section('content')
<section class="mt-4 min-h-[550px]">
    <div class="container mx-auto md:px-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:px-4">
                <div class=" container">
                    <div class="px-6 py-4  text-primary text-center">
                        <h3 class="text-3xl"><i class="fas fa-calendar-alt mr-2"></i>Jadwal Latihan</h3>
                    </div>
                    <div class="md:p-6">
                        <table class="w-full">
                            <thead class="bg-primary text-white text-center text-xs md:text-base">
                                <tr>
                                    <th class="px-4 py-2">Hari</th>
                                    <th class="px-4 py-2">Jam</th>
                                    <th class="px-4 py-2">Lokasi</th>
                                </tr>
                            </thead>
                            <tbody  class="text-xs md:text-base">

                                @foreach ($jadwal as $item)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{$item->hari}}</td>
                                    <td class="border px-4 py-2">{{$item->jam}}</td>
                                    <td class="border px-4 py-2">{{$item->lokasi}}</td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
