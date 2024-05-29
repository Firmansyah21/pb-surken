@extends('layouts.main')
@section('content')

<section class="container pt-6 mb-16 min-h-screen">
    <div class="text-center">
        <h1 class="bg-text w-fit mx-auto relative text-2xl font-semibold tracking-tight text-gray-900 uppercase">
            Galeri
        </h1>
    </div>
    <div class="grid grid-cols-1 mt-6 gap-6 sm:grid-cols-2 md:grid-cols-3">

@foreach ($galeri as $item)

<div class="relative group overflow-hidden shadow-lg rounded-lg">
    <img class="object-cover object-center w-full h-[350px] max-w-full  overflow-hidden transition-transform duration-500 ease-in-out group-hover:scale-150"
    src="{{ asset('gallery/' . $item->foto) }}"
         alt="{{$item->nama_lengkap}}" />
    <div class="absolute bottom-0 w-full h-[30%] bg-gradient-to-t from-black to-transparent"></div>
    <h2 class=" w-[90%] absolute bottom-[7%] left-[50%] transform -translate-x-1/2 text-white text-xl font-semibold px-2">{{$item->title ?? ''}}</h2>
</div>
            @endforeach


    </div>
</section>

@endsection
