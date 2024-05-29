@extends('layouts.main')
@section('content')

<section class="container min-h-screen">

    <div class="pt-5">
        <div class="text-center">
            <h1 class="bg-text text-2xl font-semibold tracking-tight text-gray-900 uppercase">
                Berita Pb.Suryakencana
            </h1>
        </div>
        {{-- @php
            $pageNumber = $post->currentPage();
            $perPage = $post->perPage();
        @endphp --}}
        <div class="mb-10 pt-20">
            <div class="grid gap-6 lg:grid-cols-3 xl:gap-x-12">
                @foreach ($post as $item) <!-- Change variable name here -->
                    @if($item->status == 1)
                        <x-card :title="$item->title" :image="asset('berita/' . $item->image)" :kategori="$item->kategori->name ?? ''" :date="$item->created_at->format('d F Y')" :time="$item->created_at->diffForHumans()" :content="$item->body" :link="route('detail-blog', ['slug' => $item->slug])" />
                    @endif
                @endforeach
            </div>
        </div>

        {{-- <div class="flex justify-center  gap-4">
            {{ $post->links() }} <!-- Now this will work -->
        </div> --}}
    </div>
</section>

@endsection
