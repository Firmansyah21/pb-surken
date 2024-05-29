<section class="mb-20 container">
    <div class="flex justify-between items-center pb-6">
        <h1 class="bg-text w-fit  relative text-base md:text-3xl font-semibold tracking-tight text-gray-900 ">
            Berita Terkini
        </h1>
        <a href="{{route('blog')}}" class="flex items-center text-sm lg:text-xl font-semibold transition-colors duration-200">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>
    </div>

       <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:gap-x-12">
         @foreach ($post as $post)
         @if($post->status == 1)
                 <x-card :title="$post->title" :image="asset('berita/' . $post->image)" :kategori="$post->kategori->name ?? ''" :date="$post->created_at->format('d F Y')" :time=" $post->created_at->diffForHumans()" :content="$post->body" :link="route('detail-blog', ['slug' => $post->slug])" />

        @endif
         @endforeach
     </div>
     </section>
