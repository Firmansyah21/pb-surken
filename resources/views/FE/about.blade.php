@extends('layouts.main')
@section('content')
<section class="pb-7 container">

    <div  class="relative bg-white overflow-hidden mt-16">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                    fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100"></polygon>
                </svg>

                <div class="pt-1"></div>

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm: lg:text-left">
                        <h2 class="my-6 text-2xl tracking-tight font-bold text-gray-900 sm:text-3xl md:text-4xl">
                            Tentang Kami
                        </h2>

                        <p>
                            We build our templates for speed in mind, for super-fast load times so your customers never waver.
                        </p>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover object-top sm:h-72 md:h-96 lg:w-full lg:h-full" src="assets/img/hero.jpg" alt="">
        </div>
    </div>

    <div class="relative mx-auto max-w-7xl z-10 grid grid-cols-1 gap-10 pt-14 sm:grid-cols-2 lg:grid-cols-3">
        <div class="rounded-md border p-4 shadow">
            <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border"
                style="background-image: linear-gradient(rgb(80, 70, 229) 0%, rgb(43, 49, 203) 100%); border-color: rgb(93, 79, 240);">
                <i class="fas fa-eye text-white"></i>
            </div>
            <h3 class="mt-6 text-xl font-semibold text-center">Visi</h3>
            <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-sm ">
                Our templates are designed to be easy to use and customize. You can choose from a variety of layouts and styles.
            </p>
        </div>

        <div class="rounded-md border p-4 shadow">
            <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border"
                style="background-image: linear-gradient(rgb(80, 70, 229) 0%, rgb(43, 49, 203) 100%); border-color: rgb(93, 79, 240);">
                <i class="fas fa-flag text-white"></i>
            </div>
            <h3 class="mt-6 text-xl font-semibold text-center">Misi</h3>
            <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-sm ">
                Our templates are designed to be easy to use and customize. You can choose from a variety of layouts and styles.
            </p>
        </div>

        <div class="rounded-md border p-4 shadow">
            <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border"
                style="background-image: linear-gradient(rgb(80, 70, 229) 0%, rgb(43, 49, 203) 100%); border-color: rgb(93, 79, 240);">
                <i class="fas fa-history text-white"></i>
            </div>
            <h3 class="mt-6 text-xl font-semibold text-center">Sejarah</h3>
            <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-sm ">
                Our templates are designed to be easy to use and customize. You can choose from a variety of layouts and styles.
            </p>
        </div>
    </div>

</section>

@endsection
