@extends('layouts.main')
@section('content')

<section class="container mt-8 min-h-screen">
    <div class="text-center ">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            Prestasi
        </h2>
    </div>
    <div class=" mt-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

            @foreach ($prestasi as $item)


            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <img class="object-cover object-center w-full h-[200px] max-w-full rounded-lg overflow-hidden transition-transform duration-500 ease-in-out transform hover:scale-110"
                src="{{ asset('prestasi/' . $item->image) }}" alt="{{$item->title}}">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{$item->title}}</h3>

                   <table class="flex flex-col gap-2 mt-2">
                        <tr>
                            <td class="max-w-2xl text-base text-gray-500"><i class="fas fa-user mr-2"></i>Pemenang</td>
                            <td class="px-2">:</td>
                            <td class="max-w-2xl text-base text-gray-500">{{$item->anggota->nama_lengkap}}</td>
                        </tr>
                        <tr>
                            <td class="max-w-2xl text-base text-gray-500"><i class="fas fa-trophy mr-2"></i>Juara</td>
                            <td class="px-2">:</td>
                            <td class="max-w-2xl text-base text-gray-500"">{{$item->juara}}</td>
                        </tr>
                        <tr>
                            <td class="max-w-2xl text-base text-gray-500"><i class="fas fa-layer-group mr-2"></i>Tingkat</td>
                            <td class="px-2">:</td>
                            <td class="max-w-2xl text-base text-gray-500"">{{$item->tingkat}}</td>
                        </tr>
                        <tr>
                            <td class="max-w-2xl text-base text-gray-500"><i class="fas fa-calendar-alt mr-2"></i>Tanggal</td>
                            <td class="px-2">:</td>
                            <td class="max-w-2xl text-base text-gray-500"">{{$item->tanggal}}</td>
                        </tr>
                   </table>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
