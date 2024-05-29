
<section class="container pb-8">
    <div class="flex justify-between items-center pb-6">
        <h1 class="bg-text w-fit  relative text-base md:text-3xl font-semibold tracking-tight text-gray-900 ">
            Foto Terbaru
        </h1>
        <a href="{{route('galeri')}}" class="flex items-center text-sm lg:text-xl font-semibold transition-colors duration-200">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
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
