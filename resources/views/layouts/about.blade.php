<section class="mb-24">
    <div class="container">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <div class="flex  ">
          <img src="
    @if(!empty($about->image))
        {{ asset('About-img/' . $about->image) }}
    @else
        {{ asset('assets/img/hero.jpg') }}
    @endif
          " alt="" class="w-full h-full object-cover object-center rounded-lg" />
        </div>
        <div class="flex flex-col mt-4">
          <h2 class="mb-3 text-ellipsis text-xl md:text-3xl font-bold">
            @if (!empty($about->title))
                {{ $about->title }}
            @else
                Tentang Kami
            @endif
            </h2>
            <p class="mb-6 text-gray-500 text-justify">
                @if (!empty($about->description))
                    {{ \Illuminate\Support\Str::limit($about->description, 600) }}
                @else
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec massa sapien faucibus et molestie ac. Ac turpis egestas maecenas pharetra. Mi eget mauris pharetra et. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Eget nullam non nisi est sit amet facilisis magna. Odio eu feugiat pretium nibh ipsum. Ultricies tristique nulla aliquet enim tortor at. Ut porttitor leo a diam sollicitudin tempor id eu nisl. Odio ut sem nulla pharetra diam sit amet nisl suscipit. Ultrices dui sapien eget mi proin sed libero enim sed. Nisi scelerisque eu ultrices vitae auctor eu augue. Mi quis hendrerit dolor magna eget est lorem. Ipsum consequat nisl vel pretium lectus. Auctor neque vitae tempus quam pellentesque.
                @endif
            </p>

            <div class="flex gap-4">
                <a href="{{route('about')}}" class="flex items-center text-sm lg:text-base font-semibold transition-colors duration-200">
                    Lihat Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>

            </div>

        </div>
        </div>
    </div>
</section>
