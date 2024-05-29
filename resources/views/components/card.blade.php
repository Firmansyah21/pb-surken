
@props(['
title', 'image', 'date', 'content', 'link','kategori','time'
])


<div
class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
<img class=" h-[200px] w-full object-cover object-center" src="{{ $image }}" alt="" />

<div class="p-6">
    <div class="flex gap-5 justify-between items-center">
        <p class=" text-neutral-500">
            <small>{{$kategori}} </small>
        </p>

        <p class="text-neutral-500">
            <small class="ml-2">
                <i class="fas fa-clock mr-1"></i> {{ $time }}
            </small>
        </p>
    </div>
    <p class="mb-2 text-neutral-500">
        <small class=""> {{ $date }}</small>
    </p>
  <h5
    class="mb-2 text-xl font-medium leading-tight text-neutral-800">
    {{ $title }}
  </h5>
  <p class="mb-4 text-sm text-neutral-600">
    {{ Str::limit($content, 100) }}
  </p>
  <a href="{{$link}}" data-te-ripple-init data-te-ripple-color="light" class="inline-block rounded-full bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">Lihat Detail</a>
</div>
</div>
