@extends('layouts.admin')
@section('container')

@include('alert.success')

<section class="w-full px-3  shadow-md">

<div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900" data-inactive-classes="text-gray-500">
    <h2 id="accordion-flush-heading-1">
      <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
        <span>Section Banner Home</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
      <div class="py-5 border-b border-gray-200">
        <form class="bg-white shadow-md px-6 pb-3" action="{{ $hero ? route('hero.update', $hero) : route('hero.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($hero) @method('PUT') @endif
            <x-input type="text" id="title" name="title" label="Judul"  :value="$hero ? $hero->title : ''" />
                <x-input type="file" id="image" name="image" label="Gambar" />
                @if($hero)
                    <img src="{{ asset('Hero-img/' . $hero->image) }}" alt="Previous Image" class="mb-4 w-20 h-10">
                @endif


              <div class="mt-7">
                <x-button-submit title="{{ $hero ? 'Update' : 'Tambah' }}" />
              </div>

        </form>
      </div>
    </div>
    <h2 id="accordion-flush-heading-2">
      <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
        <span>Section Tentang</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
      <div class="py-5 border-b border-gray-200">

        <form action="{{ $about ? route('about.update', $about) : route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($about) @method('PUT') @endif
            <x-input type="text" id="title" name="title" label="Title"  :value="$about ? $about->title : ''" />
                <x-input type="file" id="image" name="image" label="Gambar" />
                @if($about)
                    <img src="{{ asset('about-img/' . $about->image) }}" alt="Previous Image" class="mb-4 w-20 h-10">
                @endif

            <x-textarea id="description" name="description" rows="5" label="Deskripsi" :value="$about ? $about->description : ''" />
            <x-textarea id="visi" name="visi" label="Visi" rows="5" :value="$about ? $about->visi : ''" />
            <x-textarea id="misi" name="misi" label="Misi" rows="5" :value="$about ? $about->misi : ''" />
            <x-textarea id="sejarah" name="sejarah" label="Sejarah" rows="5" :value="$about ? $about->sejarah : ''" />

              <div class="mt-7">
                <x-button-submit title="{{ $about ? 'Update' : 'Tambah' }}" />
              </div>

        </form>
      </div>
    </div>


  </div>




</section>

@endsection
