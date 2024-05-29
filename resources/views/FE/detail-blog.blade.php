@extends('layouts.main')
@section('content')
<section class="mt-10">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <div class="lg:col-span-3 col-span-1">
                <img src="{{ asset('berita/' . $post->image) }}" alt="" class="max-h-[500px] w-full object-cover object-center bg-center">
                <div class="flex gap-5 mt-3">
                    <p class=" text-neutral-500 text-base">
                        <small>Kategori </small>
                    </p>
                    <p class=" text-neutral-500 text-base">
                        <small class="ml-2"> {{ \Carbon\Carbon::parse($post->created_at)->locale('id')->isoFormat('LL') }}</small>
                    </p>
                    <div class="flex space-x-4 ml-2">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank" class="text-blue-600">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }}" target="_blank" class="text-green-500">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/" target="_blank" class="text-pink-500">
                            <i class="fab fa-instagram"></i>
                        </a>

                        {{-- salin link --}}
                        <button onclick="copyToClipboard()">
                            <i class="fas fa-link text-gray-500"></i>
                        </button>

                        <div id="copyMessage" class="hidden fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-blue-500 text-white p-3 text-xs md:text-sm rounded">Link Berhasil Disalin</div>

                    </div>
                </div>

                <h1 class="md:text-3xl text-xl font-bold pt-4">{{ $post->title }}</h1>
                <p class="mt-4 text-xs md:text-sm pb-5 text-justify ">{!! nl2br(e($post->body)) !!}</p>

            </div>

            <div class="flex flex-col lg:ml-8 pb-9 lg:pb-0">
                {{-- recent post --}}
                <div class="mt-8">
                    <h2 class="font-semibold text-xl">Berita Terbaru</h2>
                    @foreach($recent as $post)
                    @if($post->status == 1)
                    <div class="mt-4">
                        <div class="flex gap-4">
                          <a href="">
                            <img src="{{asset('berita/' . $post->image) }}" alt="" class="w-24 h-24 object-cover bg-center rounded-md">

                        <div>

                            <h3 class="text-base font-semibold mt-2">{{ \Illuminate\Support\Str::limit($post->title, 14) }}</h3>
                            <p class="text-sm text-neutral-500 mt-2">{{ \Carbon\Carbon::parse($post->created_at)->locale('id')->isoFormat('LL') }}</p>
                        </a>
                        </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
            </div>
        </div>

    </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function copyToClipboard() {
        var dummy = document.createElement('input'),
        text = window.location.href;

        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);

        document.getElementById('copyMessage').classList.remove('hidden');
        setTimeout(function() {
            document.getElementById('copyMessage').classList.add('hidden');
        }, 3000);
    }
</script>
@endpush
