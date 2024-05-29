@extends('layouts.main')

@section('content')

    <section class="min-h-screen container pb-5">
        <div class="text-center pt-5 mb-10">
            <h1 class="bg-text w-fit mx-auto relative text-2xl font-semibold tracking-tight text-gray-900 uppercase">
                Pelatih Pb.Suryakencana
            </h1>
        </div>
        <div class="grid grid-cols-4 gap-5 ">
            @foreach ($pelatih as $item)
            <a href="{{ route('detail-pelatih', $item->slug) }}">
                <div class="relative group overflow-hidden shadow-lg rounded-lg">
                    <img class="object-cover object-center w-full h-[350px] max-w-full overflow-hidden transition-transform duration-500 ease-in-out group-hover:scale-150"
                         src="{{ asset('pelatih/' . $item->foto) }}"
                         alt="{{$item->nama_lengkap}}" />
                    <div class="absolute bottom-0 w-full h-[30%] bg-gradient-to-t from-black to-transparent"></div>
                    <h2 class=" w-[70%] absolute bottom-[13%] left-[39%] uppercase transform -translate-x-1/2 text-yellow-300 text-2xl font-semibold px-2">{{$item->first_name}}</h2>
                    <h2 class=" w-[90%] absolute bottom-[7%] left-[49%] transform -translate-x-1/2 text-white text-base font-semibold px-2">{{$item->nama_lengkap}}</h2>
                </div>
            </a>
            @endforeach
        </div>
        <div class="flex  justify-center">
            {{ $pelatih->links() }}
        </div>
    </section>

@endsection
